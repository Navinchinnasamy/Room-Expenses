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
    // return view('welcome');
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('expense', 'ExpensesController');
Route::get('general', 'ExpensesController@general')->name('general');
Route::post('general', 'ExpensesController@general');
Route::get('notification', 'ExpensesController@notification')->name('notification');
