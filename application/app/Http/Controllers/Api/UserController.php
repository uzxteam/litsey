<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Lib\FormProcessor;
use App\Models\Form;
use App\Models\GeneralSetting;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function userDataSubmit(Request $request)
    {
        $user = auth()->user();
        if ($user->reg_step == 1) {
            $notify[] = 'You\'ve already completed your profile';
            return response()->json([
                'remark'=>'already_completed',
                'status'=>'error',
                'message'=>['error'=>$notify],
            ]);
        }
        $validator = Validator::make($request->all(), [
            'firstname'=>'required',
            'lastname'=>'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'remark'=>'validation_error',
                'status'=>'error',
                'message'=>['error'=>$validator->errors()->all()],
            ]);
        }


        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->address = [
            'country'=>@$user->address->country,
            'address'=>$request->address,
            'state'=>$request->state,
            'zip'=>$request->zip,
            'city'=>$request->city,
        ];
        $user->reg_step = 1;
        $user->save();

        $notify[] = 'Profile completed successfully';
        return response()->json([
            'remark'=>'profile_completed',
            'status'=>'success',
            'message'=>['success'=>$notify],
        ]);
    }


    public function depositHistory(Request $request)
    {
        $deposits = auth()->user()->deposits();
        if ($request->search) {
            $deposits = $deposits->where('trx',$request->search);
        }
        $deposits = $deposits->with(['gateway'])->orderBy('id','desc')->paginate(getPaginate());
        $notify[] = 'Deposit data';
        return response()->json([
            'remark'=>'deposits',
            'status'=>'success',
            'message'=>['success'=>$notify],
            'data'=>[
                'deposits'=>$deposits
            ]
        ]);
    }

    public function transactions(Request $request)
    {
        $remarks = Transaction::distinct('remark')->get('remark');
        $transactions = Transaction::where('user_id',auth()->id());

        if ($request->search) {
            $transactions = $transactions->where('trx',$request->search);
        }


        if ($request->type) {
            $type = $request->type == 'plus' ? '+' : '-';
            $transactions = $transactions->where('trx_type',$type);
        }

        if ($request->remark) {
            $transactions = $transactions->where('remark',$request->remark);
        }

        $transactions = $transactions->orderBy('id','desc')->paginate(getPaginate());
        $notify[] = 'Transactions data';
        return response()->json([
            'remark'=>'transactions',
            'status'=>'success',
            'message'=>['success'=>$notify],
            'data'=>[
                'transactions'=>$transactions,
                'remarks'=>$remarks,
            ]
        ]);
    }

    public function submitProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname'=>'required',
            'lastname'=>'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'remark'=>'validation_error',
                'status'=>'error',
                'message'=>['error'=>$validator->errors()->all()],
            ]);
        }

        $user = auth()->user();

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->address = [
            'country'=>@$user->address->country,
            'address'=>$request->address,
            'state'=>$request->state,
            'zip'=>$request->zip,
            'city'=>$request->city,
        ];
        $user->save();

        $notify[] = 'Profile has been updated successfully';
        return response()->json([
            'remark'=>'profile_updated',
            'status'=>'success',
            'message'=>['success'=>$notify],
        ]);
    }

    public function submitPassword(Request $request)
    {
        $passwordValidation = Password::min(6);
        $general = GeneralSetting::first();
        if ($general->secure_password) {
            $passwordValidation = $passwordValidation->mixedCase()->numbers()->symbols()->uncompromised();
        }

        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'password' => ['required','confirmed',$passwordValidation]
        ]);

        if ($validator->fails()) {
            return response()->json([
                'remark'=>'validation_error',
                'status'=>'error',
                'message'=>['error'=>$validator->errors()->all()],
            ]);
        }

        $user = auth()->user();
        if (Hash::check($request->current_password, $user->password)) {
            $password = Hash::make($request->password);
            $user->password = $password;
            $user->save();
            $notify[] = 'Password changed successfully';
            return response()->json([
                'remark'=>'password_changed',
                'status'=>'success',
                'message'=>['success'=>$notify],
            ]);
        } else {
            $notify[] = 'The password doesn\'t match!';
            return response()->json([
                'remark'=>'validation_error',
                'status'=>'error',
                'message'=>['error'=>$notify],
            ]);
        }
    }
}
