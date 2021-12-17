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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/layout', function () {
    return view('layouts.layouts');
});

Route::get('/home', function () {
    return view('index');
});

Route::get('/pesan-tiket', 'PesanTiketController@index')->name('pesan-tiket');

//store
Route::post('/pesan-tiket/store', 'PesanTiketController@store')->name('pesan-tiket');

//!sisi-admin
//get
Route::get('/admin', 'AdminController@index');
Route::get('/admin/pemesanan', 'AdminController@index_pemesanan');

//edit
Route::get('/admin/pemesanan/edit/{id}', 'AdminController@edit');

//update
Route::post('/admin/pemesanan/update', 'PesanTiketController@update');

//delete
Route::get('/admin/pemesanan/delete/{id}', 'AdminController@destroy');

//cetak
Route::get('/print', 'PesanTiketController@print');
Auth::routes();
//search
Route::get('/search', 'PesanTiketController@search');
Route::get('/index', 'HomeController@index')->name('home');
