<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\StudentController;
use App\Http\Controllers\CategoryController;
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
    return view('welcome');
});

Route::get('/black', function () {
    return view('backend.blank');
})->name('admin.blank');

Route::group(['prefix' => 'admin'], function() {
    Route::get('/',[ AdminController::class, 'dashboard' ])->name('admin.dashboard');

    // Product Route List
    Route::group(['prefix' => 'product'], function() {
        Route::get('/',[ ProductController::class, 'index' ])->name('product.index');
        Route::get('/create',[ ProductController::class, 'create' ])->name('product.create');
        Route::post('/',[ ProductController::class, 'store' ])->name('product.store');
        Route::get('/show/{id}',[ ProductController::class, 'show' ])->name('product.show');
        Route::get('/edit/{id}',[ ProductController::class, 'edit' ])->name('product.edit');
        Route::put('/{id}',[ ProductController::class, 'update' ])->name('product.update');
        Route::get('/{id}',[ ProductController::class, 'destroy' ])->name('product.destroy');
    });

    // Category Route List
    Route::group(['prefix' => 'category'], function() {
        Route::get('/',[ CategoryController::class, 'index' ])->name('category.index');
        Route::get('/alldata',[ CategoryController::class, 'alldata' ])->name('category.all.index');
        Route::get('/create',[ CategoryController::class, 'create' ])->name('category.create');
        Route::post('/',[ CategoryController::class, 'store' ])->name('category.store');
        Route::get('/show/{id}',[ CategoryController::class, 'show' ])->name('category.show');
        Route::get('/edit/{id}',[ CategoryController::class, 'edit' ])->name('category.edit');
    });


});
