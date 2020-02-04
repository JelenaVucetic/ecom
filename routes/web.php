<?php
use App\Product;
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


Auth::routes();

Route::get('/', 'HomeController@welcome');

Route::get('/shop', 'HomeController@shop');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/product_details/{id}', 'HomeController@product_details');
Route::get('selectSize', 'HomeController@selectSize');

Route::get('/show_category_product/{id}', 'HomeController@show_category_product');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
        Route::get('/', function() {
            return view('admin.index');
        })->name('admin.index');

       // Route::post('admin/store', 'AdminController@store');
      //  Route::get('/admin', 'AdminController@index');

        Route::resource('product', 'ProductsController');
        Route::resource('category', 'CategoriesController');
        Route::resource('tag', 'TagsController');

        Route::get('work', 'ImageController@index');
        Route::post('work', 'ImageController@upload');

        Route::post('/savework', function () {
            return view('savework');
        });

        Route::get('EditImage/{id}', 'ProductsController@ImageEditForm')->name('ImageEditForm');
        Route::post('editProImage', 'ProductsController@editProImage')->name('editProImage');
        Route::get('/addProperty/{id}', 'ProductsController@addProperty')->name('addProperty');
        Route::post('submitProperty', 'ProductsController@submitProperty')->name('submitProperty');
        Route::get('/addSale', 'ProductsController@addSale')->name('addSale');
    }
);

Route::get('/cart', 'CartController@index');
Route::get('/cart/addItem/{id}', 'CartController@addItem');
Route::get('/cart/updateCart/{id}', 'CartController@updateCart')->name('updateCart');

Route::get('/cart/remove/{id}', 'CartController@destroy');


Route::get('/checkout', 'CheckoutController@index');
Route::post('/formvalidate', 'CheckoutController@formvalidate');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//Route::group(['middleware' => 'auth'], function() {
    Route::get('/thankyou', function() {
        return view('profile.thankyou');
    });
Route::group(['middleware' => 'auth'], function() {
    Route::get('/profile', 'ProfileController@index');
    Route::get('/orders', 'ProfileController@orders');
    Route::get('/address', 'ProfileController@address');
    Route::post('/updateAddress', 'ProfileController@updateAddress');
    Route::get('/password', 'ProfileController@password');
    Route::post('/updatePassword', 'ProfileController@updatePassword');
    Route::post('addToWishlist', 'HomeController@wishlist')->name('addToWishlist');
    Route::get('/wishlist', 'HomeController@viewWishlist');
    Route::get('/removeWishList/{id}', 'HomeController@destroy');
});
