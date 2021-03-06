<?php

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
    return view('home');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/mydetails', function () {
    return view('mydetails');
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('park/attractions/categories/{categorie}/delete', 'CategoriesController@delete')
        ->name('park.attractions.categories.delete');
    Route::resource('park/attractions/categories' , 'CategoriesController');
});

Route::get('park/attractions/{attraction}/delete', 'AttractionsController@delete')
    ->name('attractions.delete');
Route::get('park/attractions/storeReview', 'AttractionsController@storeReview')
    ->name('attractions.storeReview');
Route::get('park/attractions/updateReview/{review}', 'AttractionsController@updateReview')
    ->name('attractions.updateReview');
    Route::get('park/attractions/destroyReview/{review}', 'AttractionsController@destroyReview')
    ->name('attractions.destroyReview');
Route::resource('park/attractions' , 'AttractionsController');

Route::group(['middleware' => ['role:admin|customer']], function () {
    Route::get('park/restaurants/dishes/{dish}/delete', 'DishesController@delete')
        ->name('park.restaurants.dishes.delete');
    Route::resource('/park/restaurants/dishes', 'DishesController');
});

Route::get('park/restaurants/{restaurant}/restaurantRules/{restaurantRule}/delete', 'RestaurantRulesController@delete')
    ->name('park.restaurants.restaurantRules.delete');
Route::resource('/park/restaurants/{restaurant}/restaurantRules', 'RestaurantRulesController');

Route::get('park/restaurants/{restaurant}/delete', 'RestaurantsController@delete')
    ->name('park.restaurants.delete');
Route::get('park/restaurants/storeReview', 'RestaurantsController@storeReview')
    ->name('restaurants.storeReview');
Route::get('park/restaurants/updateReview/{review}', 'RestaurantsController@updateReview')
    ->name('restaurants.updateReview');
Route::get('park/restaurants/destroyReview/{review}', 'RestaurantsController@destroyReview')
    ->name('restaurants.destroyReview');
Route::resource('/park/restaurants', 'RestaurantsController');

Route::group(['middleware' => ['role:admin|customer']], function () {
    Route::get('park/stores/products/{product}/delete', 'ProductsController@delete')
        ->name('park.stores.products.delete');
    Route::resource('/park/stores/products', 'ProductsController');
});

Route::get('park/stores/{store}/storeRules/{storeRule}/delete', 'StoreRulesController@delete')
    ->name('park.stores.storeRules.delete');
Route::resource('/park/stores/{store}/storeRules', 'StoreRulesController');

Route::get('park/stores/{store}/delete', 'StoresController@delete')
    ->name('park.stores.delete');
Route::get('park/stores/storeReview', 'StoresController@storeReview')
    ->name('stores.storeReview');
Route::get('park/stores/updateReview/{review}', 'StoresController@updateReview')
    ->name('stores.updateReview');
Route::get('park/stores/destroyReview/{review}', 'StoresController@destroyReview')
    ->name('stores.destroyReview');
Route::resource('/park/stores', 'StoresController');

Route::group(['middleware' => ['role:admin']], function() {
    Route::get('reviews/{review}/delete', 'ReviewsController@delete')
        ->name('reviews.delete');
    Route::resource('reviews' , 'ReviewsController');
});

Route::group(['middleware' => ['role:admin|customer']], function () {
    Route::get('users/{user}/delete', 'UsersController@delete')
        ->name('users.delete');
    Route::resource('users', 'UsersController');
});

Auth::routes();
Route::get('/mypage', 'HomeController@index')->name('mypage');