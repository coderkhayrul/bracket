<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ItemController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SubCategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
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
        Route::post('/update/{id}',[ CategoryController::class, 'update' ])->name('category.update');
        Route::get('/delete/{id}',[ CategoryController::class, 'destroy' ])->name('category.destroy');
    });

    // SubCategory Route List
    Route::group(['prefix' => 'sub-category'], function() {
        Route::get('/', [SubCategoryController::class, 'index'])->name('sub-category.index');
        Route::get('/create', [SubCategoryController::class, 'create'])->name('sub-category.create');
        Route::post('/', [SubCategoryController::class, 'store'])->name('sub-category.store');
        Route::get('delete/{id}', [SubCategoryController::class, 'destroy'])->name('sub-category.delete');
    });

    // SubCategory Route List
    Route::group(['prefix' => 'item'], function() {
        Route::get('/', [ItemController::class, 'index'])->name('item.index');
        Route::get('/create', [ItemController::class, 'create'])->name('item.create');
        Route::post('/', [ItemController::class, 'store'])->name('item.store');
        Route::get('edit/{code}', [ItemController::class, 'edit'])->name('item.edit');
        Route::post('update/{id}', [ItemController::class, 'update'])->name('item.update');
        Route::get('delete/{id}', [ItemController::class, 'destroy'])->name('item.delete');
        Route::get('image/{id}', [ItemController::class, 'gallery_destroy'])->name('item.gallery.delete');
    });

});

require __DIR__.'/auth.php';
