<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Plan;
use App\Models\User;
use App\Models\Deposit;
use App\Models\Service;
use App\Lib\CurlRequest;
use App\Models\UserLogin;
use App\Models\Transaction;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\SupportTicket;
use App\Rules\FileTypeValidate;
use App\Models\AdminNotification;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function dashboard()
    {

        $pageTitle = 'Dashboard';

        // User Info
        $widget['total_users']             = User::count();
        $widget['verified_users']          = User::where('status', 1)->where('ev',1)->where('sv',1)->count();
        $widget['email_unverified_users']  = User::emailUnverified()->count();
        $widget['mobile_unverified_users'] = User::mobileUnverified()->count();


        $deposit['total_deposit_amount']        = Deposit::successful()->sum('amount');
        $deposit['total_deposit_pending']       = Deposit::pending()->count();
        $deposit['total_deposit_rejected']      = Deposit::rejected()->count();
        $deposit['total_deposit_charge']        = Deposit::successful()->sum('charge');

        $totalPlan = Plan::count();
        $totalService = Service::count();
        $orders['total_order'] = Order::count();
        $orders['total_approved'] = Order::where('status',1)->count();
        $orders['total_pending'] = Order::where('status',0)->count();

        // subscriptions report graph
        $subscriptions = Subscription::where('created_at','>=',Carbon::now()->subDays(30))
        ->selectRaw("COUNT(plan_id) as total_subscriptions, DAY(created_at) as per_day" )
        ->orderBy('created_at')
        ->whereMonth('created_at', date('m'))
        ->groupByRaw("DAY(created_at)")
        ->pluck('total_subscriptions', 'per_day');

        $subscriptionsReport['labels']= $subscriptions->keys();
        $subscriptionsReport['values']= $subscriptions->values();
        // end subscriptions report graph

        // UserLogin Report Graph
        $userLoginsReport = UserLogin::selectRaw("COUNT(*) as created_at_count, DATE(created_at) as date_name")->orderBy('created_at', 'desc')
                    ->groupByRaw("DATE(created_at)")->limit(10)
                    ->pluck('created_at_count', 'date_name');
        $userLogins['labels'] = $userLoginsReport->keys();
        $userLogins['values'] = $userLoginsReport->values();

        // UserLogin Report Graph
        $newTickets = SupportTicket::with('user')->orderBy('created_at', 'desc')->whereStatus(0)->limit(5)->get();
        return view('admin.dashboard', compact('totalPlan','totalService','subscriptionsReport','pageTitle', 'widget', 'deposit','userLogins', 'newTickets','orders'));
    }


    public function profile()
    {
        $pageTitle = 'Profile';
        $admin = auth('admin')->user();
        return view('admin.profile', compact('pageTitle', 'admin'));
    }

    public function profileUpdate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'image' => ['nullable','image',new FileTypeValidate(['jpg','jpeg','png'])]
        ]);
        $user = auth('admin')->user();

        if ($request->hasFile('image')) {
            try {
                $old = $user->image;
                $user->image = fileUploader($request->image, getFilePath('adminProfile'), getFileSize('adminProfile'), $old);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        $notify[] = ['success', 'Profile has been updated successfully'];
        return to_route('admin.profile')->withNotify($notify);
    }


    public function password()
    {
        $pageTitle = 'Password Setting';
        $admin = auth('admin')->user();
        return view('admin.profile', compact('pageTitle', 'admin'));
    }

    public function passwordUpdate(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|min:5|confirmed',
        ]);

        $user = auth('admin')->user();
        if (!Hash::check($request->old_password, $user->password)) {
            $notify[] = ['error', 'Password doesn\'t match!!'];
            return back()->withNotify($notify);
        }
        $user->password = bcrypt($request->password);
        $user->save();
        $notify[] = ['success', 'Password changed successfully.'];
        return to_route('admin.profile')->withNotify($notify);
    }

    public function notifications(){
        $notifications = AdminNotification::orderBy('id','desc')->with('user')->paginate(getPaginate());
        $pageTitle = 'Notifications';
        return view('admin.notifications',compact('pageTitle','notifications'));
    }


    public function notificationRead($id){
        $notification = AdminNotification::findOrFail($id);
        $notification->read_status = 1;
        $notification->save();
        $url = $notification->click_url;
        if ($url == '#') {
            $url = url()->previous();
        }
        return redirect($url);
    }

    public function readAll(){
        AdminNotification::where('read_status',0)->update([
            'read_status'=>1
        ]);
        $notify[] = ['success','Notifications read successfully'];
        return back()->withNotify($notify);
    }

    public function downloadAttachment($fileHash)
    {
        $filePath = decrypt($fileHash);
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
        $general = gs();
        $title = slug($general->site_name).'- attachments.'.$extension;
        $mimetype = mime_content_type($filePath);
        header('Content-Disposition: attachment; filename="' . $title);
        header("Content-Type: " . $mimetype);
        return readfile($filePath);
    }


}
