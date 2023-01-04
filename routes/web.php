<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('dashboard.home');
// })->name('dashboard');

Route::get('/view', function () {
    return view('index');
});

// product 

// Route::get('/product-manager', function () {
//     return view('products.productManager');
// })->name('product-manager');

Route::get('/them-san-pham', function () {
    return view('products.addProduct');
})->name('add-product');



// user

Route::get('/quan-ly-nguoi-dung', function () {
    return view('users.userManager');
})->name('user-manager');

// categories

// Route::get('/quan-ly-danh-muc', function () {
//     return view('categories.categoryManager');
// })->name('category-manager');


// Route::get('/show', [CategoryController::class, 'index'])->name('index');
// Route::get('/product-manager', [ProductController::class, 'index'])->name('show-product');

/// category
Route::controller(CategoryController::class)->group(function () {
    Route::get('/quan-ly-danh-muc', 'index')->name('category-manager');
    Route::get('/quan-ly-danh-muc/{id}', 'edit')->name('show-edit-category');
    Route::post('/edit-category/{id}', 'update')->name('edit-category');
    Route::post('/createCategory', 'store')->name('store');
    Route::get('/deleteCategory/{id}', 'destroy')->name('delete-category');
    Route::get('/them-danh-muc', 'create')->name('add-category');
});

//product
Route::controller(ProductController::class)->group(function () {
    Route::get('/product-manager', 'index')->name('show-product');
    Route::get('/them-san-pham', 'create')->name('show-form-product');
    Route::post('/createProduct', 'store')->name('add-product');
    Route::get('/sua-san-pham/{id}', 'edit')->name('show-edit-product');
    Route::post('/edit-product/{id}', 'update')->name('edit-product');
    Route::get('/deleteProduct/{id}', 'destroy')->name('delete-product');
});

// Route::get('/them-anh-san-pham', [ImageProductController::class, 'index'])->name('image-manager');
// Route::post('/createImageProduct', [ImageProductController::class, 'store'])->name('image');

// Route::get('/quan-ly-user', [UserController::class, 'index'])->name('user-manager');

// user -manager 

Route::controller(UserController::class)->group(function () {
    Route::get('/quan-ly-user', 'index')->name('user-manager');
    Route::get('/deleteUser/{id}', 'destroy')->name('delete-user');
    Route::get('/count', 'getCountUser')->name('count-user');
});


// dashboard
Route::get('/', [UserController::class, 'getCountUser'])->name('dashboard');


// order
Route::get('/quan-ly-hoa-don', [OrderController::class, 'index'])->name('order-manager');

Route::controller(OrderController::class)->group(function () {
    Route::get('/quan-ly-hoa-don', 'index')->name('order-manager');
    Route::get('/chi-tiet-hoa-don/{id}', 'getOrderById')->name('orderDetail');
});
