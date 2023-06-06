<?php

use App\Http\Controllers\ProductController;
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


// Routes for products
Route::get('/product',[ProductController::class,'index'])->name('product.index');
Route::post('/product',[ProductController::class,'store'])->name('product.store');
// Route for create product
Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
Route::get('/product/{product}/edit',[ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{id}',[ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{id}',[ProductController::class, 'destroy'])->name('product.destroy');