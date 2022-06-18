<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransaksiUserController;
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
    return view('auth.login');
});

// yang boleh diakses bersama
// Route::group(['middleware' => ['auth', 'ceklevel: ADMIN,USER']], function () {
// });


Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // produk
    Route::get('/products', [ProductController::class, 'index'])->name('product.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/products/save', [ProductController::class, 'store'])->name('product.store');
    Route::get('/products/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/products/update/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/products/delete/{product}', [ProductController::class, 'destroy'])->name('product.delete');

    // category
    Route::get('/category', [ProductCategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [ProductCategoryController::class, 'create'])->name('category.create');
    Route::post('/category/save', [ProductCategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{category}', [ProductCategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/update/{category}', [ProductCategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/delete/{category}', [ProductCategoryController::class, 'destroy'])->name('category.delete');

    // transaction
    Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction.index');
    Route::get('/transaction/edit/{transaction}', [TransactionController::class, 'edit'])->name('transaction.edit');
    Route::put('/transaction/update/{transaction}', [TransactionController::class, 'update'])->name('transaction.update');
    Route::get('/transaction/show/{transaction}', [TransactionController::class, 'show'])->name('transaction.show');
});


// user
// Route::group(['middleware' => ['auth', 'ceklevel:USER']], function () {
//     // transaction
//     Route::get('/transuser', [TransaksiUserController::class, 'index'])->name('transaksiuser.index');
// });
