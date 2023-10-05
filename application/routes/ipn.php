<?php

use Illuminate\Support\Facades\Route;

Route::post('paypal', 'Paypal\ProcessController@ipn')->name('Paypal');
Route::post('perfect-money', 'PerfectMoney\ProcessController@ipn')->name('PerfectMoney');
Route::post('paytm', 'Paytm\ProcessController@ipn')->name('Paytm');
Route::post('paystack', 'Paystack\ProcessController@ipn')->name('Paystack');
Route::post('voguepay', 'Voguepay\ProcessController@ipn')->name('Voguepay');
Route::get('flutterwave/{trx}/{type}', 'Flutterwave\ProcessController@ipn')->name('Flutterwave');
Route::post('razorpay', 'Razorpay\ProcessController@ipn')->name('Razorpay');
Route::post('instamojo', 'Instamojo\ProcessController@ipn')->name('Instamojo');
Route::post('coinpayments', 'Coinpayments\ProcessController@ipn')->name('Coinpayments');
Route::post('coinbase-commerce', 'CoinbaseCommerce\ProcessController@ipn')->name('CoinbaseCommerce');
Route::get('paypal-sdk', 'PaypalSdk\ProcessController@ipn')->name('PaypalSdk');
Route::post('stripe-v3', 'StripeV3\ProcessController@ipn')->name('StripeV3');

