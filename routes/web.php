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

// Login Section
Route::get('/loginform','UserController@loginForm');
Route::get('/logout','UserController@logout');
Route::get('/registerForm','UserController@registerForm');


Route::post('/login', 'UserController@login');
Route::post('/register','UserController@register');
// Login Section End

// Home Section
Route::get('/homepage','AppController@homePage')->middleware('auth');
// Home Section End

// Menu Section
Route::get('/addMenuForm','MenuController@addMenuForm')->middleware('auth');
Route::get('/deleteMenu/{id}','MenuController@deleteMenu')->middleware('auth');

Route::post('/addMenu','MenuController@addMenu')->middleware('auth');
// Menu Section End

