<?php

use App\Events\OrderCheckedEvent;
use App\Http\Controllers\AppController;
use App\Jobs\TestJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Stripe\StripeClient;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/getSessionId',function(){
    $stripe = new StripeClient(env('STRIPE_API_KEY'));
    $checkout = $stripe->checkout->sessions->create([
        'success_url'=>'http://127.0.0.1:8000',
        'cancel_url'=>'http://127.0.0.1:8000',
        'line_items'=>[
            [
               'price_data'=>[
                   'currency'=>'usd',
                   'unit_amount'=>500,
                   'product_data'=>[
                       'name'=>'Cool Stripe Checkout'
                   ]
               ],
               'quantity'=>1,
            ],
        ],

        'mode'=>'payment'
    ]);

    return $checkout;

});
Route::get('/{any}',[AppController::class,'home'])->where('any','.*');
