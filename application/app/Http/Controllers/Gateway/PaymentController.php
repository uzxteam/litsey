<?php

namespace App\Http\Controllers\Gateway;

use Carbon\Carbon;
use App\Models\Plan;
use App\Models\User;
use App\Models\Order;
use App\Models\Deposit;
use App\Models\Service;
use App\Lib\FormProcessor;
use App\Models\Transaction;
use Illuminate\Support\Str;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\GatewayCurrency;
use App\Models\AdminNotification;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{


     // service payment
     public function servicePayment($id){

        $service = Service::findOrFail($id);
        $gatewayCurrency = GatewayCurrency::whereHas('method', function ($gate) {
            $gate->where('status', 1);
        })->with('method')->orderby('method_code')->get();
        $pageTitle = 'Payment Methods';

        return view($this->activeTemplate .'user.payment.service_payment', compact('gatewayCurrency', 'pageTitle','service'));

    }

     // servicePlace
     public function servicePlace(Request $request){

        if($request->gateway == 'balance'){
            $totalAmount = $request->amount;
            $service = Service::findOrFail($request->service_id);
            // check balance
            $user = auth()->user();
            if($user->balance < $totalAmount){
                $notify[] = ['error', 'Insufficient Balance'];
                return back()->withNotify($notify);
            }

            // order table data insert
            $order = new Order();
            $order->user_id = $user->id ;
            $order->service_id = $service->id ;
            $order->order_number = Str::random(4).now()->format('dmY');
            $order->service_price = $totalAmount;
            $order->firstname = $user->firstname;
            $order->lastname = $user->lastname;
            $order->email =  $user->email;
            $order->phone =  $user->mobile;
            $order->country = $user->address->country;
            $order->address = $user->address->address;
            $order->status = 1;
            $order->save();

            // less buyer user balance
            $user->balance -= $order->service_price;
            $user->save();

            $trx = getTrx();

            $transaction                =   new Transaction();
            $transaction->user_id       =   auth()->user()->id;
            $transaction->amount        =   $order->service_price;
            $transaction->post_balance  =   $user->balance;
            $transaction->charge        =   0;
            $transaction->trx_type      =   '-';
            $transaction->details       =   'Order Place';
            $transaction->trx           =   $trx;
            $transaction->remark        =   'Order Place';
            $transaction->save();

            $adminNotification = new AdminNotification();
            $adminNotification->user_id = $order->user_id;
            $adminNotification->title = 'Order place from '.$order->firstname.$order->lastname;
            $adminNotification->click_url = '';
            $adminNotification->save();


            notify($user, 'ORDER PLACE', [
                'order_number'=>$order->order_number,
                'amount' => showAmount($order->service_price),
                'trx' => $user->trx,
                'post_balance' => showAmount($user->balance)
            ]);

            $notify[] = ['success', 'Order place has been successfully'];
            return to_route('home')->withNotify($notify);
        }

        $request->validate([
            'amount' => 'required|numeric|gt:0',
            'method_code' => 'required',
            'currency' => 'required',
        ]);


        $totalAmount = $request->amount;
        $user = auth()->user();
        $service = Service::findOrFail($request->service_id);

        // order table data insert
        $order = new Order();
        $order->user_id = $user->id ;
        $order->service_id = $service->id ;
        $order->order_number = Str::random(4).now()->format('dmY');
        $order->service_price = $totalAmount;
        $order->firstname = $user->firstname;
        $order->lastname = $user->lastname;
        $order->email =  $user->email;
        $order->phone =  $user->mobile;
        $order->country = $user->address->country;
        $order->address = $user->address->address;
        $order->status = 0;
        $order->save();

        $adminNotification = new AdminNotification();
        $adminNotification->user_id = $order->user_id ;
        $adminNotification->title ='Order request from '.$order->firstname.$order->lastname;
        $adminNotification->click_url = '';
        $adminNotification->save();

        notify($user, 'ORDER REQUEST', [
            'order_number'=>$order->order_number,
            'amount' => showAmount($order->service_price),
            'trx' => $user->trx,
            'post_balance' => showAmount($user->balance)
        ]);


        $gate = GatewayCurrency::whereHas('method', function ($gate) {
            $gate->where('status', 1);
        })->where('method_code', $request->method_code)->where('currency', $request->currency)->first();
        if (!$gate) {
            $notify[] = ['error', 'Invalid gateway'];
            return back()->withNotify($notify);
        }

        if ($gate->min_amount > $request->amount || $gate->max_amount < $request->amount) {
            $notify[] = ['error', 'Please follow deposit limit'];
            return back()->withNotify($notify);
        }

        $charge = $gate->fixed_charge + ($request->amount * $gate->percent_charge / 100);
        $payable = $request->amount + $charge;
        $final_amo = $payable * $gate->rate;

        $data = new Deposit();
        $data->user_id = $user->id;
        $data->method_code = $gate->method_code;
        $data->method_currency = strtoupper($gate->currency);
        $data->amount =  $totalAmount;
        $data->order_id = $order->id;
        $data->service_id = $service->id;
        $data->charge = $charge;
        $data->rate = $gate->rate;
        $data->final_amo = $final_amo;
        $data->btc_amo = 0;
        $data->btc_wallet = "";
        $data->trx = getTrx();
        $data->try = 0;
        $data->status = 0;
        $data->save();
        session()->put('Track', $data->trx);
        return to_route('user.deposit.confirm');

    }

    // plan
    public function payment($id){

        $subscribe = isSubscribe(auth()->user()->id);
            if($subscribe){
                $plan = Plan::findOrFail($id);

                if($subscribe->plan_id == $id){
                    if($subscribe->ends_at > now()){
                        $notify[] = ['error', 'Already Subscribed to this Plan'];
                        return back()->withNotify($notify);
                    }
                }
            }

            $gatewayCurrency = GatewayCurrency::whereHas('method', function ($gate) {
                $gate->where('status', 1);
            })->with('method')->orderby('method_code')->get();
                $pageTitle = 'Payment Methods';

            $plan = Plan::find($id);
            return view($this->activeTemplate . 'user.payment.payment', compact('gatewayCurrency', 'pageTitle','plan'));


    }

    public function deposit()
    {
        $gatewayCurrency = GatewayCurrency::whereHas('method', function ($gate) {
            $gate->where('status', 1);
        })->with('method')->orderby('method_code')->get();
        $pageTitle = 'Deposit Methods';
        return view($this->activeTemplate . 'user.payment.deposit', compact('gatewayCurrency', 'pageTitle'));
    }

    public function depositInsert(Request $request)
    {

        if($request->gateway == 'balance'){
            $user= auth()->user();
            $plan = Plan::findOrFail($request->plan_id);

            if($user->balance < $request->amount){
                $notify[] = ['error', 'Insufficient Balance'];
                return back()->withNotify($notify);
            }
            $user->balance -= $plan->price;
            $user->save();

            $trx = getTrx();

            $transaction                =   new Transaction();
            $transaction->user_id       =   $user->id;
            $transaction->amount        =   $plan->price;
            $transaction->post_balance  =   $user->balance;
            $transaction->charge        =   0;
            $transaction->trx_type      =   '-';
            $transaction->details       =   'Subscribe  plan';
            $transaction->trx           =   $trx;
            $transaction->remark        =   'Subscribe_Plan';
            $transaction->save();


            if($plan->month !=null){
                $planSubscribe=new Subscription();
                $planSubscribe->user_id= $user->id;
                $planSubscribe->plan_id=$plan->id;
                $planSubscribe->amount= $plan->price;
                $planSubscribe->starts_at= Carbon::now();
                $planSubscribe->ends_at= Carbon::now()->addDays($plan->month);
                $planSubscribe->save();
            }else{
                $planSubscribe=new Subscription();
                $planSubscribe->user_id= $user->id;
                $planSubscribe->plan_id=$plan->id;
                $planSubscribe->amount= $plan->price;
                $planSubscribe->starts_at=  Carbon::now();
                $planSubscribe->ends_at=  Carbon::now()->addDays($plan->year);
                $planSubscribe->save();
            }

                $adminNotification   = new AdminNotification();
                $adminNotification->user_id  = $user->id;
                $adminNotification->title   = 'Plan Subscribe from '.$user->username;
                $adminNotification->click_url = urlPath('admin.users.detail',$user->id);
                $adminNotification->save();

                notify($user, 'PLAN SUBSCRIBE', [
                    'plan_name'=>"Deafualt Plan",
                    'amount' => showAmount($plan->price),
                    'trx' => $user->trx,
                    'post_balance' => showAmount($user->balance)
                ]);

                $notify[] = ['success', 'Plan Subscribe has been successfully'];
                return to_route('home')->withNotify($notify);
        }

        $request->validate([
            'amount' => 'required|numeric|gt:0',
            'method_code' => 'required',
            'currency' => 'required',
        ]);


        $user = auth()->user();
        $plan_id = $request->plan_id;
        $gate = GatewayCurrency::whereHas('method', function ($gate) {
            $gate->where('status', 1);
        })->where('method_code', $request->method_code)->where('currency', $request->currency)->first();
        if (!$gate) {
            $notify[] = ['error', 'Invalid gateway'];
            return back()->withNotify($notify);
        }

        if ($gate->min_amount > $request->amount || $gate->max_amount < $request->amount) {
            $notify[] = ['error', 'Please follow deposit limit'];
            return back()->withNotify($notify);
        }

        $charge = $gate->fixed_charge + ($request->amount * $gate->percent_charge / 100);
        $payable = $request->amount + $charge;
        $final_amo = $payable * $gate->rate;

        $data = new Deposit();
        $data->user_id = $user->id;
        $data->method_code = $gate->method_code;
        $data->method_currency = strtoupper($gate->currency);
        $data->amount = $request->amount;
        $data->plan_id = $plan_id;
        $data->charge = $charge;
        $data->rate = $gate->rate;
        $data->final_amo = $final_amo;
        $data->btc_amo = 0;
        $data->btc_wallet = "";
        $data->trx = getTrx();
        $data->try = 0;
        $data->status = 0;
        $data->save();
        session()->put('Track', $data->trx);
        return to_route('user.deposit.confirm');
    }


    public function appDepositConfirm($hash)
    {
        try {
            $id = decrypt($hash);
        } catch (\Exception $ex) {
            return "Sorry, invalid URL.";
        }
        $data = Deposit::where('id', $id)->where('status', 0)->orderBy('id', 'DESC')->firstOrFail();
        $user = User::findOrFail($data->user_id);
        auth()->login($user);
        session()->put('Track', $data->trx);
        return to_route('user.deposit.confirm');
    }


    public function depositConfirm()
    {
        $track = session()->get('Track');
        $deposit = Deposit::where('trx', $track)->where('status',0)->orderBy('id', 'DESC')->with('gateway')->firstOrFail();

        if ($deposit->method_code >= 1000) {
            return to_route('user.deposit.manual.confirm');
        }


        $dirName = $deposit->gateway->alias;
        $new = __NAMESPACE__ . '\\' . $dirName . '\\ProcessController';

        $data = $new::process($deposit);
        $data = json_decode($data);


        if (isset($data->error)) {
            $notify[] = ['error', $data->message];
            return to_route(gatewayRedirectUrl())->withNotify($notify);
        }
        if (isset($data->redirect)) {
            return redirect($data->redirect_url);
        }

        // for Stripe V3
        if(@$data->session){
            $deposit->btc_wallet = $data->session->id;
            $deposit->save();
        }

        $pageTitle = 'Payment Confirm';
        return view($this->activeTemplate . $data->view, compact('data', 'pageTitle', 'deposit'));
    }


    public static function userDataUpdate($deposit,$isManual = null)
    {
        if ($deposit->status == 0 || $deposit->status == 2) {
            $user = User::find($deposit->user_id);
            $deposit->status = 1;
            $deposit->save();

            $user = User::find($deposit->user_id);

            if (!isset($deposit->order_id) && !isset($deposit->plan_id) ) {
                $user->balance += $deposit->amount;
                $user->save();
            }

            if(isset($deposit->plan_id)){

                $plan = Plan::findOrFail($deposit->plan_id);

                if($plan->month !=null){
                    $subscribe=new Subscription();
                    $subscribe->user_id= $user->id;
                    $subscribe->plan_id=$plan->id;
                    $subscribe->amount= $plan->price;
                    $subscribe->starts_at= Carbon::now();
                    $subscribe->ends_at= Carbon::now()->addDays($plan->month);
                    $subscribe->save();
                }else{
                    $subscribe=new Subscription();
                    $subscribe->user_id= $user->id;
                    $subscribe->plan_id=$plan->id;
                    $subscribe->amount= $plan->price;
                    $subscribe->starts_at=  Carbon::now();
                    $subscribe->ends_at=  Carbon::now()->addDays($plan->year);
                    $subscribe->save();
                }

                $transaction = new Transaction();
                $transaction->user_id = $deposit->user_id;
                $transaction->amount = $deposit->amount;
                $transaction->post_balance = $user ? $user->balance : null;
                $transaction->charge = $deposit->charge;
                $transaction->trx_type = '+';
                $transaction->details = 'Deposit Via ' . $deposit->gatewayCurrency()->name;
                $transaction->trx = $deposit->trx;
                $transaction->remark = 'deposit';
                $transaction->save();


                $adminNotification = new AdminNotification();
                $adminNotification->user_id = $user->id;
                $adminNotification->title = $plan->name.' Plan Subscribe from '.$user->username;
                $adminNotification->click_url = urlPath('admin.users.detail',$user->id);
                $adminNotification->save();

                notify($user, 'PLAN SUBSCRIBE', [
                    'plan_name'=>$plan->name,
                    'amount' => showAmount($plan->price),
                    'trx' => $user->trx,
                    'post_balance' => showAmount($user->balance)
                ]);


            }


            if(isset($deposit->order_id)){

                $order = Order::findOrFail($deposit->order_id);
                $order->status = 1;
                $order->save();

                $adminNotification = new AdminNotification();
                $adminNotification->user_id = $deposit->user_id ;
                $adminNotification->title = 'Order place from '.$user->firstname.$user->lastname;
                $adminNotification->click_url = urlPath('admin.deposit.successful');
                $adminNotification->save();

                notify($user, 'ORDER PLACE', [
                    'order_number'=>$order->order_number,
                    'amount' => showAmount($order->service_price),
                    'trx' => $user->trx,
                    'post_balance' => showAmount($user->balance)
                ]);
            }


            if (!$isManual) {
                $adminNotification = new AdminNotification();
                $adminNotification->user_id = $user->id;
                $adminNotification->title = 'Deposit successful via '.$deposit->gatewayCurrency()->name;
                $adminNotification->click_url = urlPath('admin.deposit.successful');
                $adminNotification->save();
            }
            notify($user, $isManual ? 'DEPOSIT_APPROVE' : 'DEPOSIT_COMPLETE', [
                'method_name' => $deposit->gatewayCurrency()->name,
                'method_currency' => $deposit->method_currency,
                'method_amount' => showAmount($deposit->final_amo),
                'amount' => showAmount($deposit->amount),
                'charge' => showAmount($deposit->charge),
                'rate' => showAmount($deposit->rate),
                'trx' => $deposit->trx,
                'post_balance' => showAmount($user->balance)
            ]);


        }
    }

    public function manualDepositConfirm()
    {
        $track = session()->get('Track');
        $data = Deposit::with('gateway')->where('status', 0)->where('trx', $track)->first();
        if (!$data) {
            return to_route(gatewayRedirectUrl());
        }
        if ($data->method_code > 999) {

            $pageTitle = 'Deposit Confirm';
            $method = $data->gatewayCurrency();
            $gateway = $method->method;
            return view($this->activeTemplate . 'user.payment.manual', compact('data', 'pageTitle', 'method','gateway'));
        }
        abort(404);
    }

    public function manualDepositUpdate(Request $request)
    {
        $track = session()->get('Track');
        $data = Deposit::with('gateway')->where('status', 0)->where('trx', $track)->first();
        if (!$data) {
            return to_route(gatewayRedirectUrl());
        }
        $gatewayCurrency = $data->gatewayCurrency();
        $gateway = $gatewayCurrency->method;
        $formData = $gateway->form->form_data;

        $formProcessor = new FormProcessor();
        $validationRule = $formProcessor->valueValidation($formData);
        $request->validate($validationRule);
        $userData = $formProcessor->processFormData($request, $formData);


        $data->detail = $userData;
        $data->status = 2; // pending
        $data->save();


        $adminNotification = new AdminNotification();
        $adminNotification->user_id = $data->user->id;
        $adminNotification->title = 'Deposit request from '.$data->user->username;
        $adminNotification->click_url = urlPath('admin.deposit.details',$data->id);
        $adminNotification->save();

        notify($data->user, 'DEPOSIT_REQUEST', [
            'method_name' => $data->gatewayCurrency()->name,
            'method_currency' => $data->method_currency,
            'method_amount' => showAmount($data->final_amo),
            'amount' => showAmount($data->amount),
            'charge' => showAmount($data->charge),
            'rate' => showAmount($data->rate),
            'trx' => $data->trx
        ]);

        $notify[] = ['success', 'Your request has been taken'];
        return to_route('user.deposit.history')->withNotify($notify);
    }


}
