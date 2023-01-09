<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageProductController;
use App\Http\Controllers\LoginController;
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

// Route::get('/login2', function () {
//     return view('checkLogin');
// });

// product 

// Route::get('/product-manager', function () {
//     return view('products.productManager');
// })->name('product-manager');

// Route::get('/them-san-pham', function () {
//     return view('products.addProduct');
// })->name('add-product');



// user

// Route::get('/quan-ly-nguoi-dung', function () {
//     return view('users.userManager');
// })->name('user-manager');

// categories

// Route::get('/quan-ly-danh-muc', function () {
//     return view('categories.categoryManager');
// })->name('category-manager');


// Route::get('/show', [CategoryController::class, 'index'])->name('index');
// Route::get('/product-manager', [ProductController::class, 'index'])->name('show-product');

/// category
Route::middleware('checkLogin')->group(function () {

    // dashboard
    Route::get('/', [UserController::class, 'getCountUser'])->name('dashboard');

    // category
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/quan-ly-danh-muc', 'index')->name('category.index');
        Route::middleware('checkRole')->group(function () {
            Route::get('/quan-ly-danh-muc/{id}', 'edit')->name('category.edit');
            Route::post('/edit-category/{id}', 'update')->name('category.update');
            Route::post('/createCategory', 'store')->name('category.store');
            Route::get('/deleteCategory/{id}', 'destroy')->name('category.destroy');
            Route::get('/them-danh-muc', 'create')->name('category.create');
        });
    });

    // product
    Route::controller(ProductController::class)->group(function () {
        Route::get('/product-manager', 'index')->name('product.index');
        Route::middleware('checkRole')->group(function () {
            Route::get('/them-san-pham', 'create')->name('product.create');
            Route::post('/createProduct', 'store')->name('prodcut.store');
            Route::get('/sua-san-pham/{id}', 'edit')->name('product.edit');
            Route::post('/edit-product/{id}', 'update')->name('product.update');
            Route::get('/deleteProduct/{id}', 'destroy')->name('product.destroy');
        });
    });

    // user 
    Route::controller(UserController::class)->group(function () {
        Route::get('/quan-ly-user', 'index')->name('user.index');
        Route::middleware('checkRole')->group(function () {
            Route::get('/deleteUser/{id}', 'destroy')->name('user.destroy');
            Route::get('/count', 'getCountUser')->name('user.getCountUser');
            Route::get('/unlock/{id}', 'unLockUser')->name('user.unlock');
            Route::get('/chi-tiet-user/{id}', 'getUserById')->name('user.getUserById');
        });
    });

    //order
    Route::controller(OrderController::class)->group(function () {
        Route::get('/quan-ly-hoa-don', 'index')->name('order.index');
        Route::get('/chi-tiet-hoa-don/{id}', 'getOrderById')->name('order.getOrderById');
    });
});

//product
// Route::middleware('checkLogin')->group(function () {
//     Route::controller(ProductController::class)->group(function () {
//         Route::get('/product-manager', 'index')->name('show-product');
//         Route::get('/them-san-pham', 'create')->name('show-form-product');
//         Route::post('/createProduct', 'store')->name('add-product');
//         Route::get('/sua-san-pham/{id}', 'edit')->name('show-edit-product');
//         Route::post('/edit-product/{id}', 'update')->name('edit-product');
//         Route::get('/deleteProduct/{id}', 'destroy')->name('delete-product');
//     });
// });

// user -manager 

// Route::controller(UserController::class)->group(function () {
//     Route::get('/quan-ly-user', 'index')->name('user-manager');
//     Route::get('/deleteUser/{id}', 'destroy')->name('delete-user');
//     Route::get('/count', 'getCountUser')->name('count-user');
// })->middleware('checkLogin');


// dashboard
// Route::get('/', [UserController::class, 'getCountUser'])->name('dashboard')->middleware('checkLogin');


// order
// Route::get('/quan-ly-hoa-don', [OrderController::class, 'index'])->name('order-manager');

// Route::controller(OrderController::class)->group(function () {
//     Route::get('/quan-ly-hoa-don', 'index')->name('order-manager');
//     Route::get('/chi-tiet-hoa-don/{id}', 'getOrderById')->name('orderDetail');
// });

Route::controller(LoginController::class)->group(function () {
    Route::get('/admin/login', 'create')->name('admin-login');
    Route::post('login1', 'authenticate')->name('admin-login1');
    Route::get('logout', 'logout')->name('admin-logout');
    Route::get('register', 'register')->name('admin-register');
});

Route::get('admin_login', function () {
    return view('admin.login');
});
// Route::get('admin_register', function () {
//     return view('admin.register');
// });

Route::controller(AdminController::class)->group(function () {
    Route::get('admin/login', 'showFormLogin')->name('admin.showFormLogin');
    Route::get('admin/register', 'create')->name('admin.create');
    Route::post('admin/login', 'authenticate')->name('admin.authenticate');
    Route::post('admin/register', 'store')->name('admin.store');
    Route::get('admin/logout', 'logout')->name('admin.logout');
});
// Route::post('admin-login', [AdminController::class, 'create'])->name('admin.store');
// 