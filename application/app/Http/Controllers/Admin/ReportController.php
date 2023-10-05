<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NotificationLog;
use App\Models\Transaction;
use App\Models\UserLogin;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function transaction(Request $request)
    {
        $pageTitle = 'Transaction Logs';

        $remarks = Transaction::distinct('remark')->orderBy('remark')->get('remark');

        $transactions = Transaction::with('user')->orderBy('id','desc');
        if ($request->search) {
            $search = request()->search;
            $transactions = $transactions->where(function ($q) use ($search) {
                $q->where('trx', 'like', "%$search%")->orWhereHas('user', function ($user) use ($search) {
                    $user->where('username', 'like', "%$search%");
                });
            });
        }

        if ($request->type) {
            $transactions = $transactions->where('trx_type',$request->type);
        }

        if ($request->remark) {
            $transactions = $transactions->where('remark',$request->remark);
        }

        //date search
        if($request->date) {
            $date = explode('-',$request->date);
            $request->merge([
                'start_date'=> trim(@$date[0]),
                'end_date'  => trim(@$date[1])
            ]);
            $request->validate([
                'start_date'    => 'required|date_format:m/d/Y',
                'end_date'      => 'nullable|date_format:m/d/Y'
            ]);
            if($request->end_date) {
                $endDate = Carbon::parse($request->end_date)->addHours(23)->addMinutes(59)->addSecond(59);
                $transactions   = $transactions->whereBetween('created_at', [Carbon::parse($request->start_date), $endDate]);
            }else{
                $transactions   = $transactions->whereDate('created_at', Carbon::parse($request->start_date));
            }
        }

        $transactions = $transactions->paginate(getPaginate());
        return view('admin.reports.transactions', compact('pageTitle', 'transactions','remarks'));
    }

    public function loginHistory(Request $request)
    {
        $loginLogs = UserLogin::orderBy('id','desc')->with('user');
        $pageTitle = 'User Login History';
        if ($request->search) {
            $search = $request->search;
            $pageTitle = 'User Login History - ' . $search;
            $loginLogs = $loginLogs->whereHas('user', function ($query) use ($search) {
                $query->where('username', $search);
            });
        }
        $loginLogs = $loginLogs->paginate(getPaginate());
        return view('admin.reports.logins', compact('pageTitle', 'loginLogs'));
    }

    public function loginIpHistory($ip)
    {
        $pageTitle = 'Login by - ' . $ip;
        $loginLogs = UserLogin::where('user_ip',$ip)->orderBy('id','desc')->with('user')->paginate(getPaginate());
        return view('admin.reports.logins', compact('pageTitle', 'loginLogs','ip'));

    }

    public function notificationHistory(Request $request){
        $pageTitle = 'Notification History';
        $logs = NotificationLog::orderBy('id','desc');
        $search = $request->search;
        if ($search) {
            $logs = $logs->whereHas('user', function ($user) use ($search) {
                $user->where('username', 'like',"%$search%");
            });
        }
        $logs = $logs->with('user')->paginate(getPaginate());
        return view('admin.reports.notification_history', compact('pageTitle','logs'));
    }

    public function emailDetails($id){
        $pageTitle = 'Email Details';
        $email = NotificationLog::findOrFail($id);
        return view('admin.reports.email_details', compact('pageTitle','email'));
    }
}
