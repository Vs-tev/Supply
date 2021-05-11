<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

use App\Http\Controllers\Admin\CustomersController;
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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});





/* Admin routes */
Route::group(['prefix' => 'Admin'], function(){

    /* Home */
    Route::get('/Home', [App\Http\Controllers\HomeController::class, 'adminIndex'])->name('admin.home');
    
    /* Products */
    Route::get('/MyProducts', [App\Http\Controllers\Admin\MyProductsController::class, 'index'])->name('my_products');
    Route::put('/MyProducts/toggleAvailability ', [App\Http\Controllers\Admin\MyProductsController::class, 'toggleProductAvailability'])->name('product_availability');
    Route::post('/MyProducts/store ', [App\Http\Controllers\Admin\MyProductsController::class, 'store'])->name('product.store');
    Route::post('/MyProducts/update ', [App\Http\Controllers\Admin\MyProductsController::class, 'update'])->name('product.update');
    Route::delete('/MyProducts/destroyPhoto ', [App\Http\Controllers\Admin\MyProductsController::class, 'currentProductPhotoDestroy'])->name('current-product-photo.destroy');
    Route::delete('/MyProducts/destroy ', [App\Http\Controllers\Admin\MyProductsController::class, 'destroy'])->name('product.destroy');

    /* Customers */
    Route::get('/Customers', [CustomersController::class, 'index'])->name('customers');
    Route::get('/Customers/CustomerDeteils/{id}', [CustomersController::class, 'show'])->name('CustomerDeteils');
    
    /*Orders  */
    Route::get('/Orders', [App\Http\Controllers\Admin\OrdersController::class, 'index'])->name('orders');
    Route::put('/Orders/orderStatusChange', [App\Http\Controllers\Admin\OrdersController::class, 'orderStatusChange'])->name('order_status.change');
    Route::get('/Orders/CurrentOrder/{id}', [App\Http\Controllers\Admin\OrdersController::class, 'show'])->name('order');

    /* Categories */
    Route::get('/Categories', [App\Http\Controllers\Admin\CategoriesController::class, 'index'])->name('categories');
    Route::post('/Categories/store', [App\Http\Controllers\Admin\CategoriesController::class, 'store'])->name('categories.store');
    Route::post('/Categories/update', [App\Http\Controllers\Admin\CategoriesController::class, 'update'])->name('category.update');

});

Route::get('Admin/PDF/{id}', [App\Http\Controllers\Admin\PDFController::class, 'openOrderAsPDF'])->name('show.PDF');

/* User routes */
Route::group(['prefix' => 'Customer'], function(){

    Route::get('/Home', [App\Http\Controllers\HomeController::class, 'customerIndex'])->name('customer.home');
    
    Route::get('Products', [App\Http\Controllers\Customer\ProductsController::class, 'index'])->name('products');
    Route::get('Products/search', [App\Http\Controllers\Customer\ProductsController::class, 'searchProduct'])->name('products.search');
        

    Route::post('Products/addToBasket', [App\Http\Controllers\Customer\ProductsController::class, 'addProductToBasket'])->name('addProductToBasket');

    Route::delete('Products/removeFromBasket', [App\Http\Controllers\Customer\ProductsController::class, 'removeProducFromBasket'])->name('removeFromBasket');
    Route::delete('Products/removeAllFromBasket', [App\Http\Controllers\Customer\ProductsController::class, 'removeAllFromBasket'])->name('empty.basket');

    Route::get('/Products/checkoutOrder', [App\Http\Controllers\Customer\MyOrdersController::class, 'checkoutOrder'])->name('checkoutOrder');
    Route::post('/Products/checkout', [App\Http\Controllers\Customer\MyOrdersController::class, 'checkout'])->name('checkout.order');

    Route::get('/MyOrders', [App\Http\Controllers\Customer\MyOrdersController::class, 'index'])->name('my_orders');
    
});
    


 