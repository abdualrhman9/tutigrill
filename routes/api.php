<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MealController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('categories',[CategoryController::class,'index']);

Route::middleware('auth:sanctum')->name('category')->group(function(){
    Route::post('categories',[CategoryController::class,'store']);
    Route::patch('categories/{category}',[CategoryController::class,'update']);
});


Route::middleware('auth:sanctum')->name('meal.')->group(function(){
    Route::post('meals',[MealController::class,'store']);
    Route::patch('meals/{meal}',[MealController::class,'update']);
});
