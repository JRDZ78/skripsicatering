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

Route::get('/', function()
{
   return View::make('home.index');
});

// Admin Only
Route::get('/manageUserForm','UserController@manageUserForm')->middleware('auth');
Route::get('/manageCaterForm','CaterController@manageCaterForm')->middleware('auth');
// Admin Only

// Login Section
Route::get('/loginform','UserController@loginForm');
Route::get('/logout','UserController@logout');
Route::get('/registerForm','UserController@registerForm');


Route::post('/login', 'UserController@login')->name('login');
Route::post('/register','UserController@register');
// Login Section End

// Home Section
Route::get('/homepage','AppController@homePage')->middleware('auth');
// Home Section End

// Profile Section
Route::get('/viewProfileForm','UserController@viewProfileForm')->middleware('auth');
Route::get('/updateProfileForm','UserController@updateProfileForm')->middleware('auth');
Route::get('/changePasswordForm','UserController@changePasswordForm')->middleware('auth');

Route::get('/viewCaterProfileForm','CaterController@viewCaterProfileForm')->middleware('auth');
Route::get('/updateCaterProfileForm','CaterController@updateCaterProfileForm')->middleware('auth');

Route::post('/updateProfile','UserController@updateProfile');
Route::post('/updateCaterProfile','CaterController@updateCaterProfile');
Route::post('/changePassword','UserController@changePassword');
// Profile Section End


// Menu Section
Route::get('/addMenuForm','MenuController@addMenuForm')->middleware('auth');
Route::get('/updateMenuForm/{id}','MenuController@updateMenuForm')->middleware('auth');
Route::get('/deleteMenu/{id}','MenuController@deleteMenu')->middleware('auth');

Route::post('/addMenu','MenuController@addMenu')->middleware('auth');
Route::post('/updateMenu','MenuController@updateMenu')->middleware('auth');
// Menu Section End

// Transaction Section
Route::get('/transactionListForm','TransactionController@transactionListForm')->middleware('auth');
Route::get('/accept/{id}','TransactionController@accept')->middleware('auth');
Route::get('/reject/{id}','TransactionController@reject')->middleware('auth');
// Transaction Section End


//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
