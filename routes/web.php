<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('welcome');
});

Route::get('welcome','welcomeController@index')->name('welcome.index');
Auth::routes();
Route::get('logout', 'QovexController@logout');
Route::get('index', 'QovexController@index');


Route::get('pages-login', 'QovexController@index');
Route::get('pages-login-2', 'QovexController@index');
Route::get('pages-register', 'QovexController@index');
Route::get('pages-register-2', 'QovexController@index');
Route::get('pages-recoverpw', 'QovexController@index');
Route::get('pages-recoverpw-2', 'QovexController@index');
Route::get('pages-lock-screen', 'QovexController@index');
Route::get('pages-lock-screen-2', 'QovexController@index');
Route::get('pages-404', 'QovexController@index');
Route::get('pages-500', 'QovexController@index');
Route::get('pages-maintenance', 'QovexController@index');
Route::get('pages-comingsoon', 'QovexController@index');
Route::post('login-status', 'QovexController@checkStatus');


// You can also use auth middleware to prevent unauthenticated users
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    // Route::get('{any}', 'QovexController@index');
});  


// Route::resource('user','UserController');

Route::get('users', 'UserController@index')->name('user.index');
Route::post('users', 'UserController@store')->name('user.store');
Route::delete('users/{user}', 'UserController@detroy')->name('user.destroy');

// Rutas creadas por Michael

Route::resource('enquiry','EnquiryController');


//Rutas creadas por Arling
Route::resource('events','EventsController');

