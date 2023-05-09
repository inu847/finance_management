<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryDetailController;
use App\Http\Controllers\TransaksiController;
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

Route::get('/', function () {
    return redirect()->route("login");
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::resource('transaction', TransaksiController::class);
Route::resource('category', CategoryController::class);
Route::resource('category-detail', CategoryDetailController::class);
Route::get('/category-detail/category/{id}', [CategoryDetailController::class, 'findCategory'])->name('category-detail.findCategory');
Route::put('/transaction/update-status/{id}', [TransaksiController::class, 'updateStatus'])->name('transaction.updateStatus');
