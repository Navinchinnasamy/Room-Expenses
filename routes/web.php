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
Route::post('pay-rent', 'HomeController@payRent')->name('pay-rent');
Route::post('update-expense', 'ExpensesController@updateExpense')->name('update-expense');
Route::get('add-user', 'HomeController@addUser')->name('add-user');
Route::post('add-user', 'HomeController@addUser');
Route::get('view-user', 'HomeController@viewUser')->name('view-user');
