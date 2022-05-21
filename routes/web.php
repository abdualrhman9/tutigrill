<?php

use App\Events\OrderCheckedEvent;
use App\Http\Controllers\AppController;
use App\Jobs\TestJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::get('/{any}',[AppController::class,'home'])->where('any','.*');
