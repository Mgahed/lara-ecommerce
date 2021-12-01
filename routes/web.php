<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CartPageController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    /*Route::get('/', function () {
        return view('front.index');
    })->name('home');*/
    Route::get('/', [IndexController::class, 'index'])->name('home');

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

        /*----- Admin Slider All Routes -----*/
        Route::prefix('slider')->group(function () {
            Route::get('/view', [SliderController::class, 'SliderView'])->name('manage-slider');
            Route::post('/store', [SliderController::class, 'SliderStore'])->name('slider.store');
            Route::get('/edit/{id}', [SliderController::class, 'SliderEdit'])->name('slider.edit');
            Route::post('/update', [SliderController::class, 'SliderUpdate'])->name('slider.update');
            Route::get('/delete/{id}', [SliderController::class, 'SliderDelete'])->name('slider.delete');
            Route::get('/inactive/{id}', [SliderController::class, 'SliderInactive'])->name('slider.inactive');
            Route::get('/active/{id}', [SliderController::class, 'SliderActive'])->name('slider.active');
        });

        /*----- Admin coupon -----*/
        Route::prefix('coupons')->group(function(){
            Route::get('/view', [CouponController::class, 'CouponView'])->name('manage-coupon');
            Route::post('/store', [CouponController::class, 'CouponStore'])->name('coupon.store');
            Route::get('/edit/{id}', [CouponController::class, 'CouponEdit'])->name('coupon.edit');
            Route::post('/update/{id}', [CouponController::class, 'CouponUpdate'])->name('coupon.update');
            Route::get('/delete/{id}', [CouponController::class, 'CouponDelete'])->name('coupon.delete');
        });

        /*----- Admin shipping -----*/
        Route::prefix('shipping')->group(function(){
            // Ship Division
            Route::get('/division/view', [ShippingAreaController::class, 'DivisionView'])->name('manage-division');
            Route::post('/division/store', [ShippingAreaController::class, 'DivisionStore'])->name('division.store');
            Route::get('/division/edit/{id}', [ShippingAreaController::class, 'DivisionEdit'])->name('division.edit');
            Route::post('/division/update/{id}', [ShippingAreaController::class, 'DivisionUpdate'])->name('division.update');
            Route::get('/division/delete/{id}', [ShippingAreaController::class, 'DivisionDelete'])->name('division.delete');


            // Ship District
            /*Route::get('/district/view', [ShippingAreaController::class, 'DistrictView'])->name('manage-district');
            Route::post('/district/store', [ShippingAreaController::class, 'DistrictStore'])->name('district.store');
            Route::get('/district/edit/{id}', [ShippingAreaController::class, 'DistrictEdit'])->name('district.edit');
            Route::post('/district/update/{id}', [ShippingAreaController::class, 'DistrictUpdate'])->name('district.update');
            Route::get('/district/delete/{id}', [ShippingAreaController::class, 'DistrictDelete'])->name('district.delete');*/

        });


    });

    /*----- normal -----*/
    /*----- user -----*/
    Route::group(['prefix' => 'user', 'middleware' => ['auth:sanctum', 'verified']], function () {
        Route::get('profile', [IndexController::class, 'UserProfile'])->name('user.profile');
        Route::post('profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');
        Route::get('change-password', [IndexController::class, 'UserChangePassword'])->name('change.password');
        Route::post('password-update', [IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');
    });

    /*----- auth -----*/
    // Add to Wishlist
    Route::post('wishlist/add/{product_id}', [WishlistController::class, 'AddToWishlist']);

    Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
        // Wishlist page
        Route::group(['prefix' => 'wishlist'], function () {
            Route::get('/', [WishlistController::class, 'ViewWishlist'])->name('wishlist');
            /*Route::get('/get-wishlist-product', [WishlistController::class, 'GetWishlistProduct']);*/
            Route::get('/wishlist-remove/{id}', [WishlistController::class, 'RemoveWishlistProduct'])->name('wishlist.delete');
        });

        Route::group(['prefix' => 'mycart'],function () {
            // Cart page
            Route::get('/', [CartPageController::class, 'MyCart'])->name('mycart');
            /*Route::get('/user/get-cart-product', [CartPageController::class, 'GetCartProduct']);*/
            Route::get('/remove/{rowId}', [CartPageController::class, 'RemoveCartProduct'])->name('remove.mycart');
            /*Route::get('/increment/{rowId}', [CartPageController::class, 'CartIncrement']);
            Route::get('/decrement/{rowId}', [CartPageController::class, 'CartDecrement']);*/

            /*-- checkout --*/
            Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');
            Route::get('/district-get/ajax/{division_id}', [CheckoutController::class, 'DistrictGetAjax']);
            Route::get('/state-get/ajax/{district_id}', [CheckoutController::class, 'StateGetAjax']);
            Route::post('/checkout/store', [CheckoutController::class, 'CheckoutStore'])->name('checkout.store');
        });

        /*Route::post('/stripe/order', [StripeController::class, 'StripeOrder'])->name('stripe.order');*/
        Route::post('/cash/order', [CashController::class, 'CashOrder'])->name('cash.order');
        Route::get('/my/orders', [AllUserController::class, 'MyOrders'])->name('my.orders');
        Route::get('/order_details/{order_id}', [AllUserController::class, 'OrderDetails']);
        Route::get('/invoice_download/{order_id}', [AllUserController::class, 'InvoiceDownload']);
        Route::post('/return/order/{order_id}', [AllUserController::class, 'ReturnOrder'])->name('return.order');
        Route::get('/return/order/list', [AllUserController::class, 'ReturnOrderList'])->name('return.order.list');
        Route::get('/cancel/orders', [AllUserController::class, 'CancelOrders'])->name('cancel.orders');

        // Order Traking Route
        Route::post('/order/tracking', [AllUserController::class, 'OrderTraking'])->name('order.tracking');
    });

    /*----- products -----*/
    Route::group(['prefix' => 'product'], function () {
        Route::get('/details/{id}', [IndexController::class, 'ProductDetails'])->name('product.details');
        Route::get('/subcategory/{subcat_id}', [IndexController::class, 'SubCatWiseProduct'])->name('products.by.subcategory');
        Route::get('/view/modal/{id}', [IndexController::class, 'ProductViewAjax'])->name('get.product.ajax');
    });

    /*----- cart -----*/
    Route::group(['prefix' => 'cart'], function () {
        Route::post('/data/store/{id}', [CartController::class, 'AddToCart']);
        // Get Data from mini cart
        Route::get('/mini', [CartController::class, 'AddMiniCart']);
        // Remove mini cart all
        Route::get('/mini/remove/all', [CartController::class, 'RemoveAll']);
        // Remove mini cart
        Route::get('/mini/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']);

        /*-- coupon --*/
        Route::post('/coupon-apply', [CartController::class, 'CouponApply'])->name('apply.coupon');
        Route::get('/coupon-calculation', [CartController::class, 'CouponCalculation'])->name('coupon.calculation');
        Route::get('/coupon-remove', [CartController::class, 'CouponRemove'])->name('coupon.remove');

    });

    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return redirect()->route('home');
    })->name('dashboard');
});
