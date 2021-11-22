<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Frontend\IndexController;
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
    return view('front.index');
})->name('home');

/*----- admin -----*/
Route::group(['prefix' => 'admin', 'middleware' => ['auth:sanctum', 'verified', 'UserRole']], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    /*----- Admin Category all Routes -----*/
    Route::prefix('category')->group(function () {

        Route::get('/view', [CategoryController::class, 'CategoryView'])->name('all.category');

        Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');

        Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');

        Route::post('/update/{id}', [CategoryController::class, 'CategoryUpdate'])->name('category.update');

        Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');

        /*----- Admin Sub Category All Routes -----*/
        Route::prefix('sub')->group(function () {
            Route::get('/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);

            Route::get('/view', [SubCategoryController::class, 'SubCategoryView'])->name('all.subcategory');

            Route::post('/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');

            Route::get('/edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');

            Route::post('/update/{id}', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');

            Route::get('/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');
        });

    });

    /*----- Admin Products All Routes -----*/

    Route::prefix('product')->group(function () {

        Route::get('/add', [ProductController::class, 'AddProduct'])->name('add-product');

        Route::post('/store', [ProductController::class, 'StoreProduct'])->name('product-store');
        Route::get('/manage', [ProductController::class, 'ManageProduct'])->name('manage-product');

        Route::get('/edit/{id}', [ProductController::class, 'EditProduct'])->name('product.edit');

        Route::post('/data/update', [ProductController::class, 'ProductDataUpdate'])->name('product-update');

        Route::post('/image/update', [ProductController::class, 'MultiImageUpdate'])->name('update-product-image');

        Route::post('/thambnail/update', [ProductController::class, 'ThambnailImageUpdate'])->name('update-product-thambnail');

        Route::get('/multiimg/delete/{id}', [ProductController::class, 'MultiImageDelete'])->name('product.multiimg.delete');

        Route::get('/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product.delete');

    });

});

/*----- normal -----*/
Route::group(['prefix' => 'user', 'middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('profile', [IndexController::class, 'UserProfile'])->name('user.profile');
    Route::post('profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');
    Route::get('change-password', [IndexController::class, 'UserChangePassword'])->name('change.password');
    Route::post('password-update', [IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect()->route('home');
})->name('dashboard');
