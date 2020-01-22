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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/shop', 'HomeController@shop');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/product_details/{id}', 'HomeController@product_details');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
        Route::get('/', function() {
            return view('admin.index');
        })->name('admin.index');

       // Route::post('admin/store', 'AdminController@store');
      //  Route::get('/admin', 'AdminController@index');

        Route::resource('product', 'ProductsController');
        Route::resource('category', 'CategoriesController');
    }
);

Route::get('/cart', 'CartController@index');
Route::get('/cart/addItem/{id}', 'CartController@addItem');
Route::get('/cart/remove/{id}', 'CartController@destroy');
Route::put('/cart/update/{id}', 'CartController@update');

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
}); 