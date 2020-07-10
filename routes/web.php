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

Route::get('/test', 'HomeController@test');

Route::get('/', 'HomeController@welcome');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/specialprice', 'HomeController@specialPrice');

Route::get('/product_details/{id}', 'HomeController@product_details');
/* Route::post('/product_price/{id}', 'HomeController@product_price'); */

Route::get('selectSize', 'HomeController@selectSize');

Route::post('/addReview', 'HomeController@addReview');
Route::post('/addStar', 'HomeController@addStar');

Route::post('/category_search', 'HomeController@showCategoryProduct');

Route::get('/search', 'HomeController@search')->name('search');
Route::post('/search', 'HomeController@searchProduct');

Route::get('/gifts_for_him', 'HomeController@giftsForHim');
Route::get('/gifts_for_her', 'HomeController@giftsForHer');

Route::get('/privacy_policy', 'HomeController@privacyPolicy');
Route::get('/how_to_order', 'HomeController@howToOrder');
Route::get('/shipping_and_handling', 'HomeController@shipping');
Route::get('/help_center', 'HomeController@helpCenter');
Route::get('/copyright', 'HomeController@copyright');
Route::get('/contact_us', 'HomeController@contact');

Route::resource('category', 'CategoriesController');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
        Route::get('/', 'AdminController@index')->name('dashboard');
        Route::resource('product', 'ProductsController');
   
        Route::resource('tag', 'TagsController');

        Route::get('work', 'ImageController@index');
        Route::post('work', 'ImageController@upload');

        Route::post('work/action', 'AjaxUploadController@action')->name('ajaxupload.action');
        Route::post('work/save', 'AjaxUploadController@save')->name('ajaxupload.save');
        Route::post('/savework', function () {
            return view('/admin/upload_design/savework');
        });

        Route::post('work/action', 'AjaxUploadController@action')->name('ajaxupload.action');
        
        Route::get('/upload_mockup', 'ImageController@display_mockup');
        Route::post('/upload_mockup', 'ImageController@upload_final_mockup');
        
     
        Route::post('/upload_final', 'ImageController@final_mockup')->name('upload_final');


        Route::get('EditImage/{id}', 'ProductsController@ImageEditForm')->name('ImageEditForm');
        Route::post('editProImage', 'ProductsController@editProImage')->name('editProImage');
        Route::get('/addProperty/{id}', 'ProductsController@addProperty')->name('addProperty');
        Route::post('submitProperty', 'ProductsController@submitProperty')->name('submitProperty');
        Route::get('/addSale', 'ProductsController@addSale')->name('addSale');
    }
);


Route::post('/load_images', 'HomeController@loadImages');
Route::post('/load_images_phone', 'HomeController@loadImagesPhone');
Route::get('/cart', 'CartController@index');
Route::post('/cart/addItem/{id}', 'CartController@addItem');
Route::get('/cart/updateCart/{id}', 'CartController@updateCart')->name('updateCart');

Route::get('/cart/remove/{id}', 'CartController@destroy');

Route::post('/formvalidate', 'CheckoutController@formvalidate');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/payment_info', 'CheckoutController@payment_info');
Route::get('/error', 'CheckoutController@error');
Route::post('/callback', 'CheckoutController@callback');
Route::get('/cancel', 'CheckoutController@cancel');


Route::group(['middleware' => 'auth'], function() {
Route::post('/addToWishlist', 'HomeController@wishlist')->name('addToWishlist');
});


Route::group(['middleware' => 'auth'], function() {
    Route::post('/addToWishlist', 'HomeController@wishlist')->name('addToWishlist');
    Route::get('/profile', 'ProfileController@index');
    Route::get('/address', 'ProfileController@address');
    Route::get('/profile_image', 'ProfileController@profilImage');
    Route::post('/profile_image', 'ProfileController@updateProfilImage');
    Route::post('/createAddress', 'ProfileController@createAddress')->name('createAddress');
    Route::post('/updateAddress', 'ProfileController@updateAddress');
    Route::get('/password', 'ProfileController@password');
    Route::post('/updatePassword', 'ProfileController@updatePassword');
    Route::get('/my_wishlist', 'ProfileController@myWishlist');
    Route::get('/wishlist', 'HomeController@viewWishlist');
    Route::get('/removeWishList/{id}', 'HomeController@destroy');
});
