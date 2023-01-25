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
})->middleware('auth');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('reserrve',[\App\Http\Controllers\ReservationController::class,'store'])->name('row.store');
Route::get('list',[\App\Http\Controllers\ReservationController::class,'index'])->name('reserve.index')->middleware('checkrole');
Route::get('list/{id}',[\App\Http\Controllers\ReservationController::class,'show'])->name('reserve.show');
Route::resource('product',ProductController::class);
Route::resource('users',\App\Http\Controllers\UserController::class);

