<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view('home','home');


Route::get('/login',[LoginController::class,'login'])->name('login');


Route::post('do-login',[LoginController::class,'doLogin'])->name('do-login');


Route::middleware(['web'])->prefix('admin')->group(function (){
    
Route::resource('categories', CategoryController::class);


Route::get('logout',[LoginController::class,'logout'])->name('logout');
});