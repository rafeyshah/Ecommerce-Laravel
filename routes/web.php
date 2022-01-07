<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/redirect', [HomeController::class, 'redirect']);
Route::get('/', [HomeController::class, 'index']);
Route::get('/product', [AdminController::class, 'product']);
Route::get('/category', [AdminController::class, 'category']);

Route::post('/upload_product', [AdminController::class, 'upload_product']);
Route::post('/upload_category', [AdminController::class, 'upload_category']);

Route::get('/show_product', [AdminController::class, 'show_product']);
Route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);
Route::get('/update_product/{id}', [AdminController::class, 'update_product']);
Route::post('/update_product_save/{id}', [AdminController::class, 'update_product_save']);

Route::get('/delete/{id}', [HomeController::class, 'deletecart']);
Route::get('/search', [HomeController::class, 'search']);
Route::post('/addcart/{id}', [HomeController::class, 'addcart']);
Route::get('/showcart', [HomeController::class, 'showcart']);

Route::post('/order', [HomeController::class, 'confirmorder']);
Route::get('/show_orders', [HomeController::class, 'show_orders']);
Route::get('/update_status/{id}', [AdminController::class, 'update_status']);

