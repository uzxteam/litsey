<?php

use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('Api')->name('api.')->group(function(){

    Route::get('general-setting',function()
    {
        $general = GeneralSetting::first();
        $notify[] = 'General setting data';
        return response()->json([
            'remark'=>'general_setting',
            'status'=>'success',
            'message'=>['success'=>$notify],
            'data'=>[
                'general_setting'=>$general,
            ],
        ]);
    });

    Route::get('get-countries',function(){
        $c = json_decode(file_get_contents(resource_path('views/includes/country.json')));
        $notify[] = 'General setting data';
        foreach($c as $k => $country){
            $countries[] = [
                'country'=>$country->country,
                'dial_code'=>$country->dial_code,
                'country_code'=>$k,
            ];
        }
        return response()->json([
            'remark'=>'country_data',
            'status'=>'success',
            'message'=>['success'=>$notify],
            'data'=>[
                'countries'=>$countries,
            ],
        ]);
    });

	Route::namespace('Auth')->group(function(){
		Route::post('login', 'LoginController@login');
		Route::post('register', 'RegisterController@register');

        Route::controller('ForgotPasswordController')->group(function(){
            Route::post('password/email', 'sendResetCodeEmail')->name('password.email');
            Route::post('password/verify-code', 'verifyCode')->name('password.verify.code');
            Route::post('password/reset', 'reset')->name('password.update');
        });
	});

    Route::middleware('auth:sanctum')->group(function () {

        //authorization
        Route::controller('AuthorizationController')->group(function(){
            Route::get('authorization', 'authorization')->name('authorization');
            Route::get('resend-verify/{type}', 'sendVerifyCode')->name('send.verify.code');
            Route::post('verify-email', 'emailVerification')->name('verify.email');
            Route::post('verify-mobile', 'mobileVerification')->name('verify.mobile');
            Route::post('verify-g2fa', 'g2faVerification')->name('go2fa.verify');
        });

        Route::middleware(['check.status'])->group(function () {
            Route::post('user-data-submit', 'UserController@userDataSubmit')->name('data.submit');

            Route::middleware('registration.complete')->group(function(){
                Route::get('dashboard',function(){
                    return auth()->user();
                });

                Route::get('user-info',function(){
                    $notify[] = 'User information';
                    return response()->json([
                        'remark'=>'user_info',
                        'status'=>'success',
                        'message'=>['success'=>$notify],
                        'data'=>[
                            'user'=>auth()->user()
                        ]
                    ]);
                });

                Route::controller('UserController')->group(function(){

                    //Report
                    Route::any('deposit/history', 'depositHistory')->name('deposit.history');
                    Route::get('transactions','transactions')->name('transactions');

                });

                //Profile setting
                Route::controller('UserController')->group(function(){
                    Route::post('profile-setting', 'submitProfile');
                    Route::post('change-password', 'submitPassword');
                });

            

                // Payment
                Route::controller('PaymentController')->group(function(){
                    Route::get('deposit/methods', 'methods')->name('deposit');
                    Route::post('deposit/insert', 'depositInsert')->name('deposit.insert');
                    Route::get('deposit/confirm', 'depositConfirm')->name('deposit.confirm');
                    Route::get('deposit/manual', 'manualDepositConfirm')->name('deposit.manual.confirm');
                    Route::post('deposit/manual', 'manualDepositUpdate')->name('deposit.manual.update');
                });

            });
        });

        Route::get('logout', 'Auth\LoginController@logout');
    });
});
