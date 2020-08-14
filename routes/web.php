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

Route::get('/', 'MainController@index')->name('main');

Auth::routes();

Route::get('/main', 'MainController@index')->name('main');
Route::get('/contact', 'MainController@contact')->name('contact');

Route::resources([
    'goods' => 'GoodController'
]);

Route::resource('goods', 'GoodController', [
    'except' => [
        'index',
        'show'
    ]
])
->middleware('adminormanager');

Route::resource(
    'appointments', 'AppointmentController'
)->middleware('auth');

Route::resource(
    'categories', 'CategoryController'
)->middleware('admin');

Route::resource(
    'roleusers', 'RoleUserController'
)->middleware('admin');