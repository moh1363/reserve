<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    $products=Product::all();

    return view('welcome',compact('products'));
})->middleware('auth')->name('home');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('reserve',[\App\Http\Controllers\ReservationController::class,'store'])->name('row.store')->middleware('auth');
Route::get('list',[\App\Http\Controllers\ReservationController::class,'index'])->name('reserve.index')->middleware('checkrole');
Route::get('list/{id}',[\App\Http\Controllers\ReservationController::class,'show'])->name('reserve.show')->middleware('checkrole');
//Route::resource('product',ProductController::class)->middleware('checkrole');
//Route::resource('users',\App\Http\Controllers\UserController::class)->middleware('checkrole');

Route::get('/changepassword', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('change-password');
Route::post('/changepassword', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('update-password');

Route::get('/users',[UserController::class,'index'])->name('users.index');
Route::get('/fetch-user',[UserController::class,'fetchuser']);
Route::get('/edit-user/{id}',[UserController::class,'edit'])->name('editt');
Route::put('/update-user/{id}',[UserController::class,'update']);
Route::delete('/delete-user/{id}',[UserController::class,'destroy']);

Route::get('/fetch-product',[ProductController::class,'fetchproduct']);
Route::get('/product',[ProductController::class,'index'])->name('products.index');
Route::delete('/delete-product/{id}',[ProductController::class,'destroy']);
Route::get('/edit-product/{id}',[ProductController::class,'edit']);
Route::put('/update-product/{id}',[ProductController::class,'update']);

