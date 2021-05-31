<?php

use Illuminate\Support\Facades\Route;

use App\User;
use App\Rider;
use App\Vendor;
use App\Customer;

use App\ShopCategories;
use App\Shop;


//Welcome Page
Route::get('/', function () {

  $shop_categories = ShopCategories::all();
  $shops = Shop::all();

    if(Session::get('admin_value')){
        return view('admin/home');
    }

    if(Session::get('vendor_value')){
            return view('vendor/home');
    }

    if(Session::get('rider_value')){
        return view('rider/home');
    }

    if(Session::get('user_value')){
        return view('home',compact('shops','shop_categories'));
    }

    return view('welcome',compact('shops','shop_categories'));
});

Auth::routes();

//Login Routes
Route::get('/login', 'LoginController@getLog')->name('login');
//Route::get('/register', 'LoginController@getRegister')->name('register');
//Route::get('/forget', 'LoginController@forgetUser')->name('get.forget');
Route::post('user-login', [
    'uses' => 'LoginController@login',
    'as' => 'user.login'
]);


//Rider
Route::get('/rider-register', 'RiderController@riderRegistration')->name('rider.register');


//Vendor
Route::get('/vendor-register', 'VendorController@vendorRegistration')->name('vendor.register');
Route::get('/vendor-shop', 'VendorController@shopGet')->name('vendor.shopGet');
Route::post('/vendor-shop', 'VendorController@shopPost')->name('vendor.shopPost');
Route::post('/vendor-products', 'VendorController@addProducts')->name('vendor.addProducts');
Route::get('/vendor-products-update{id}', 'VendorController@updateProductsGet')->name('vendor.updateProductsGet');
Route::post('/vendor-products-update', 'VendorController@updateProductsPost')->name('vendor.updateProductsPost');
Route::get('/vendor-products-delate{id}', 'VendorController@delateProducts')->name('vendor.delateProducts');
//Orders
Route::get('/vendor-orders', 'VendorController@getOrders')->name('vendor.getOrders');
Route::post('/vendor-orders-update', 'VendorController@updateOrderPost')->name('vendor.updateOrderPost');

////Admin
//Shop Categories
Route::get('/admin-shop', 'AdminController@shopCategoriesGet')->name('admin.shopCategoriesGet');
Route::post('/admin-shop', 'AdminController@addShopCategories')->name('admin.addShopCategories');
Route::get('/admin-shop-update{id}', 'AdminController@updateShopCategoriesGet')->name('admin.updateShopCategoriesGet');
Route::post('/admin-shop-update', 'AdminController@updateShopCategoriesPost')->name('admin.updateShopCategoriesPost');
Route::get('/admin-shop-delate{id}', 'AdminController@delateShopCategories')->name('admin.delateShopCategories');
//Shops
Route::get('/admin-shops', 'AdminController@shopsGet')->name('admin.shopsGet');
Route::post('/admin-shops', 'AdminController@addShops')->name('admin.addShops');
Route::get('/admin-shops-update{id}', 'AdminController@updateShopsGet')->name('admin.updateShopsGet');
Route::post('/admin-shops-update', 'AdminController@updateShopsPost')->name('admin.updateShopsPost');
Route::get('/admin-shops-delate{id}', 'AdminController@delateShops')->name('admin.delateShops');
//Product Categories
Route::get('/admin-product', 'AdminController@productCategoriesGet')->name('admin.productCategoriesGet');
Route::post('/admin-product', 'AdminController@addProductCategories')->name('admin.addProductCategories');
Route::get('/admin-product-update{id}', 'AdminController@updateProductCategoriesGet')->name('admin.updateProductCategoriesGet');
Route::post('/admin-product-update', 'AdminController@updateProductCategoriesPost')->name('admin.updateProductCategoriesPost');
Route::get('/admin-product-delate{id}', 'AdminController@delateProductCategories')->name('admin.delateProductCategories');
//Products
Route::get('/admin-products', 'AdminController@productsGet')->name('admin.productsGet');
Route::post('/admin-products', 'AdminController@addProducts')->name('admin.addProducts');
Route::get('/admin-products-update{id}', 'AdminController@updateProductsGet')->name('admin.updateProductsGet');
Route::post('/admin-products-update', 'AdminController@updateProductsPost')->name('admin.updateProductsPost');
Route::get('/admin-products-delate{id}', 'AdminController@delateProducts')->name('admin.delateProducts');
//Orders
Route::get('/admin-orders', 'AdminController@getOrders')->name('admin.getOrders');
Route::post('/admin-orders-update', 'AdminController@updateOrderPost')->name('admin.updateOrderPost');


//Home Routes
Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/admin', 'HomeController@admin_index')->name('admin.home');
    Route::get('/vendor', 'HomeController@vendor_index')->name('vendor.home');
    Route::get('/rider', 'HomeController@rider_index')->name('rider.home');
});



//Customer
Route::get('/about', 'CustomerController@aboutGet')->name('customer.aboutGet');
Route::get('/contact', 'CustomerController@contactGet')->name('customer.contactGet');

//Restaurants
Route::get('/restaurants', 'CustomerController@restaurantsGet')->name('customer.restaurantsGet');

//Products
Route::get('/products{id}', 'CustomerController@productsGet')->name('customer.productsGet');
//Carts
Route::post('/add_to_cart', 'CustomerController@addToCart')->name('customer.add_to_cart');
Route::get('/cart', 'CustomerController@getCart')->name('customer.get_cart');
Route::get('/cart-data', 'CustomerController@getCartData')->name('customer.getCartData');
Route::delete('/cart-delete{id}', 'CustomerController@delateToCart')->name('customer.cart_delete');
Route::delete('/cart-up{id}', 'CustomerController@amountUp')->name('customer.amountUp');
Route::delete('/cart-down{id}', 'CustomerController@amountDown')->name('customer.amountDown');
//CheckOut
Route::post('/cart-checkout', 'CustomerController@checkOut')->name('customer.checkOut');
//Orders
Route::get('/orders', 'CustomerController@getOrders')->name('customer.getOrders');
