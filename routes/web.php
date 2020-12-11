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


Route::get('users', 'UserController@index')->name('user.index');
Route::post('users', 'UserController@store')->name('user.store');
Route::delete('users/{user}', 'UserController@detroy')->name('user.destroy');

// Rutas creadas por Michael

Route::resource('enquiry','EnquiryController');
Route::get('enrolment.create/{enquiry}','EnrolmentController@create')->name('enrolment.create');
Route::post('enrolment.store','EnrolmentController@store')->name('enrolment.store');




//Rutas creadas por Arling
Route::resource('events','EventsController');

