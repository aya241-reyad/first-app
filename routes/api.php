<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);


Route::group(['middleware'=>'auth:api'],function(){
Route::get('categories',[CategoryController::class,'all']);
Route::post('categories/create',[CategoryController::class,'add']);

Route::post('categories/edit/{id}',[CategoryController::class,'edit']);

Route::get('categories/{id}',[CategoryController::class,'show']);

Route::delete('categories/{id}',[CategoryController::class,'destroy']);
Route::post('logout',[AuthController::class,'logout']);


});
