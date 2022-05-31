<?php

use App\Events\OrderCheckedEvent;
use App\Http\Controllers\AppController;
use App\Http\Controllers\PaymentController;
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
Route::post('/getSessionId',[PaymentController::class,'getSessionId']);
Route::get('/{any}',[AppController::class,'home'])->where('any','.*');
