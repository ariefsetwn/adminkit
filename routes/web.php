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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/user', 'UserController@index');
Route::get('/user/create', 'UserController@create');
Route::post('/user/store', 'UserController@store');
Route::get('/user/{id}/edit', 'UserController@edit');
Route::put('/user/{id}/update', 'UserController@update');
Route::delete('/user/{id}/destroy', 'UserController@destroy');
// Route::get('/setting/ubah-password', 'UserController@edit');
// Route::put('/ubah_password/update', 'UserController@update');

Route::get('/data-barang', 'DataBarangController@index');
Route::get('/data-barang/{kode_barang}/detail', 'DataBarangController@show');
Route::get('/data-barang/create', 'DataBarangController@create');
Route::post('/data-barang/store', 'DataBarangController@store');
Route::get('/data-barang/{kode_barang}/edit', 'DataBarangController@edit');
Route::put('/data-barang/{kode_barang}/update', 'DataBarangController@update');
Route::delete('/data-barang/{kode_barang}/destroy', 'DataBarangController@destroy');




