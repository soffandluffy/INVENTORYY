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

use Yajra\Datatables\Datatables;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

// Admin
Route::get('/admin','HomeController@admin');
Route::get('/admin/hapus/{id}','HomeController@delete');

// Barang
Route::get('/stok','BarangController@stok');
Route::get('/barang','BarangController@barang');
Route::get('/barang/tambah','BarangController@tambah');
Route::post('/barang/add','BarangController@add');
Route::get('/barang/ubah/{id}','BarangController@edit');
Route::post('/barang/update','BarangController@update');
Route::get('/barang/hapus/{id}','BarangController@delete');
Route::get('/autoB','BarangController@auto');
Route::get('/searchB','BarangController@search');
Route::get('/searchS','BarangController@searchs');

// Penjualan
Route::get('/penjualan','PenjualanController@penjualan');
Route::get('/penjualan/tambah','PenjualanController@pt');
Route::post('/penjualan/add','PenjualanController@add');
Route::get('/autoP','PenjualanController@auto');
Route::get('/searchP','PenjualanController@search');

// Barang Masuk
Route::get('/barangmasuk','BMasukController@barang_masuk');
Route::get('/barangmasuk/tambah','BMasukController@pt');
Route::post('/barangmasuk/add','BMasukController@add');
Route::get('/autoBM','BMasukController@auto');
Route::get('/searchBM','BMasukController@search');

// Excel
Route::get('downloadExcel/{type}', 'BarangController@downloadExcel');
Route::get('bm/downloadExcel/{type}', 'BMasukController@downloadExcel');
Route::get('pj/downloadExcel/{type}', 'PenjualanController@downloadExcel');
Route::post('importExcel', 'BarangController@importExcel');

// Error