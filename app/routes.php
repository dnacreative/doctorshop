<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

/*
Route::get('test', function()
{
	$user = new User();
	$user->email = "admin";
	$user->real_name = "admin";
	$user->password = Hash::make("admin");
	$user->save();

	return "The test user has been saved to database.";
});
*/

Route::any('/', 'ProductsController@getIndex');
Route::get('login', 'AuthController@getLogin');
Route::post('login', 'AuthController@postLogin');
Route::get('logout', 'AuthController@getLogout');
// Route::controller('auth', 'AuthController');
Route::controller('users', 'UsersController');
Route::controller('categories', 'CategoriesController');
Route::controller('products', 'ProductsController');
Route::controller('cart', 'CartController');