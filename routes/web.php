<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminProductReviewController;
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

Route::post('/admin', 'AdminController@postLoginAdmin');

Route::get('/admin', 'AdminController@loginAdmin');
//home page admin
Route::get('/home', function () {
    return view('home');
});
//catergory routers
Route::prefix('admin')->group(function () {
    Route::prefix('categorys')->group(function () {

        Route::get('/', [
            'as' => 'categorys.index',
            'uses' => 'CategoryController@index',
        ]);

        Route::get('/create', [
            'as' => 'categorys.create',
            'uses' => 'CategoryController@create',
        ]);

        Route::post('/store', [
            'as' => 'categorys.store',
            'uses' => 'CategoryController@store',
        ]);
        //router edit
        Route::get('/edit/{id}', [
            'as' => 'categorys.edit',
            'uses' => 'CategoryController@edit',
        ]);
        //fouter update
        Route::post('/update/{id}', [
            'as' => 'categorys.update',
            'uses' => 'CategoryController@update',
        ]);
        //router delete
        Route::get('/delete/{id}', [
            'as' => 'categorys.delete',
            'uses' => 'CategoryController@delete',
        ]);
    });
    //menu router

    Route::prefix('menus')->group(function () {

        Route::get('/', [
            'as' => 'menus.index',
            'uses' => 'MenuController@index',
        ]);

        Route::get('/create', [
            'as' => 'menus.create',
            'uses' => 'MenuController@create',
        ]);

        Route::post('/store', [
            'as' => 'menus.store',
            'uses' => 'MenuController@store',
        ]);
        //router show form edit
        Route::get('/edit/{id}', [
            'as' => 'menus.edit',
            'uses' => 'MenuController@edit',
        ]);
        //fouter update
        Route::post('/update/{id}', [
            'as' => 'menus.update',
            'uses' => 'MenuController@update',
        ]);
        //router delete
        Route::get('/delete/{id}', [
            'as' => 'menus.delete',
            'uses' => 'MenuController@delete',
        ]);
    });
    //Product routers
    Route::prefix('products')->group(function () {

        Route::get('/', [
            'as' => 'product.index',
            'uses' => 'AdminProductController@index',
        ]);

        Route::get('/create', [
            'as' => 'product.create',
            'uses' => 'AdminProductController@create',
        ]);



        Route::post('/store', [
            'as' => 'product.store',
            'uses' => 'AdminProductController@store',
        ]);
        //router show form edit product
        Route::get('/edit/{id}', [
            'as' => 'products.edit',
            'uses' => 'AdminProductController@edit',
        ]);
        //fouter update
        Route::post('/update/{id}', [
            'as' => 'products.update',
            'uses' => 'AdminProductController@update',
        ]);
        //router delete
        Route::get('/delete/{id}', [
            'as' => 'products.delete',
            'uses' => 'AdminProductController@delete',
        ]);
    });

    //Slider routers
    Route::prefix('sliders')->group(function () {

        Route::get('/', [
            'as' => 'slider.index',
            'uses' => 'AdminSliderController@index',
        ]);

        Route::get('/create', [
            'as' => 'slider.create',
            'uses' => 'AdminSliderController@create',
        ]);



        Route::post('/store', [
            'as' => 'slider.store',
            'uses' => 'AdminSliderController@store',
        ]);
        //router show form edit slider
        Route::get('/edit/{id}', [
            'as' => 'slider.edit',
            'uses' => 'AdminSliderController@edit',
        ]);
        //fouter update
        Route::post('/update/{id}', [
            'as' => 'slider.update',
            'uses' => 'AdminSliderController@update',
        ]);
        //router delete
        Route::get('/delete/{id}', [
            'as' => 'slider.delete',
            'uses' => 'AdminSliderController@delete',
        ]);
    });

    //Setting routers
    Route::prefix('settings')->group(function () {

        Route::get('/', [
            'as' => 'setting.index',
            'uses' => 'AdminSettingController@index',
        ]);

        Route::get('/create', [
            'as' => 'setting.create',
            'uses' => 'AdminSettingController@create',
        ]);



        Route::post('/store', [
            'as' => 'setting.store',
            'uses' => 'AdminSettingController@store',
        ]);
        //router show form edit settings
        Route::get('/edit/{id}', [
            'as' => 'setting.edit',
            'uses' => 'AdminSettingController@edit',
        ]);
        //fouter update
        Route::post('/update/{id}', [
            'as' => 'setting.update',
            'uses' => 'AdminSettingController@update',
        ]);
        //router delete
        Route::get('/delete/{id}', [
            'as' => 'setting.delete',
            'uses' => 'AdminSettingController@delete',
        ]);
    });
    //Users routers
    Route::prefix('users')->group(function () {

        Route::get('/', [
            'as' => 'user.index',
            'uses' => 'AdminUserController@index',
        ]);

        Route::get('/create', [
            'as' => 'user.create',
            'uses' => 'AdminUserController@create',
        ]);



        Route::post('/store', [
            'as' => 'user.store',
            'uses' => 'AdminUserController@store',
        ]);
        //router show form edit settings
        Route::get('/edit/{id}', [
            'as' => 'user.edit',
            'uses' => 'AdminUserController@edit',
        ]);
        //fouter update
        Route::post('/update/{id}', [
            'as' => 'user.update',
            'uses' => 'AdminUserController@update',
        ]);
        // //router delete
        Route::get('/delete/{id}', [
            'as' => 'user.delete',
            'uses' => 'AdminUserController@delete',
        ]);
    });

    //Roles routers
    Route::prefix('roles')->group(function () {

        Route::get('/', [
            'as' => 'role.index',
            'uses' => 'AdminRoleController@index',
        ]);

        Route::get('/create', [
            'as' => 'role.create',
            'uses' => 'AdminRoleController@create',
        ]);
        Route::post('/store', [
            'as' => 'role.store',
            'uses' => 'AdminRoleController@store',
        ]);
        //router show form edit settings
        Route::get('/edit/{id}', [
            'as' => 'role.edit',
            'uses' => 'AdminRoleController@edit',
        ]);
        //fouter update
        Route::post('/update/{id}', [
            'as' => 'role.update',
            'uses' => 'AdminRoleController@update',
        ]);
        // //router delete
        Route::get('/delete/{id}', [
            'as' => 'role.delete',
            'uses' => 'AdminRoleController@delete',
        ]);
    });

    //Orders routers
    Route::prefix('orders')->group(function () {
        Route::get('/', [
            'as' => 'order.index',
            'uses' => 'AdminOrderController@index',
        ]);
        Route::get('/create', [
            'as' => 'order.create',
            'uses' => 'AdminOrderController@create',
        ]);


        Route::post('/store', [
            'as' => 'order.store',
            'uses' => 'AdminOrderController@store',
        ]);

        Route::get('/show/{id}', [
            'as' => 'order.show',
            'uses' => 'AdminOrderController@show',
        ]);

        Route::post('/update-status/{id}', [
            'as' => 'order.updateStatus',
            'uses' => 'AdminOrderController@updateStatus',
        ]);

        Route::get('/delete/{id}', [
            'as' => 'order.delete',
            'uses' => 'AdminOrderController@delete',
        ]);
    });

    // Quản lý Bình luận/Đánh giá sản phẩm
    Route::prefix('product-reviews')->group(function () {
        Route::get('/', [AdminProductReviewController::class, 'index'])->name('product-review.index');
        Route::get('/create', [AdminProductReviewController::class, 'create'])->name('product-review.create');
        Route::post('/store', [AdminProductReviewController::class, 'store'])->name('product-review.store');
        Route::get('/show/{id}', [AdminProductReviewController::class, 'show'])->name('product-review.show');
        Route::post('/update-status/{id}', [AdminProductReviewController::class, 'updateStatus'])->name('product-review.updateStatus');
        Route::get('/delete/{id}', [AdminProductReviewController::class, 'delete'])->name('product-review.delete');
    });
});
