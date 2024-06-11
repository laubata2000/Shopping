<?php

use App\Http\Controllers\CategoryController;
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
});
