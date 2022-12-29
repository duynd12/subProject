<?php

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
    return view('dashboard.home');
})->name('dashboard');

Route::get('/view', function () {
    return view('index');
});

// product 

Route::get('/product-manager', function () {
    return view('products.productManager');
})->name('product-manager');

Route::get('/them-san-pham', function () {
    return view('products.addProduct');
})->name('add-product');

Route::get('/sua-san-pham', function () {
    return view('products.editProduct');
})->name('edit-product');


// user

Route::get('/quan-ly-nguoi-dung', function () {
    return view('users.userManager');
})->name('user-manager');

// categories

Route::get('/quan-ly-danh-muc', function () {
    return view('categories.categoryManager');
})->name('category-manager');


Route::get('/them-danh-muc', function () {
    return view('categories.addCategory');
})->name('add-category');


Route::get('/sua-danh-muc', function () {
    return view('categories.editCategory');
})->name('edit-category');
