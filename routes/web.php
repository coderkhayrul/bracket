<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\StudentController;
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

Route::group(['prefix' => 'admin'], function() {
    Route::get('/',[ AdminController::class, 'dashboard' ])->name('admin.dashboard');

    Route::get('/black', function () {
        return view('backend.blank');
    })->name('admin.blank');

    // Student Route List
    Route::group(['prefix' => 'product'], function() {

        Route::get('/',[ ProductController::class, 'index' ])->name('product.index');
        Route::get('/create',[ ProductController::class, 'create' ])->name('product.create');
        Route::post('/store',[ ProductController::class, 'store' ])->name('product.store');
    });


});
