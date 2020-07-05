<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/info', 'InfoController@index')->name('info');
Route::get('/info/fashion', 'InfoController@fashion')->name('fashion');
Route::get('/info/kuliner', 'InfoController@kuliner')->name('kuliner');
Route::get('/info/wisata', 'InfoController@wisata')->name('wisata');
Route::get('/info/jasa', 'InfoController@jasa')->name('jasa');
Route::get('/infonya/{slug}', 'InfoController@infonya')->name('info-detail');
Route::get('/event-loker', 'EventLokerController@index')->name('event-loker');
Route::get('/berita', 'BeritaController@index')->name('berita');
Route::get('/berita/cari', 'BeritaController@cari')->name('cari-berita');
Route::get('/beritanya/{slug}', 'BeritaController@beritanya')->name('berita-detail');
Route::get('/berita/kategori/{slug}', 'BeritaController@kategori')->name('kategori');
Route::get('/berita/tagar/{slug}', 'BeritaController@tagar')->name('tagar');

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'verified', 'admin'])
    ->group(function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');

        Route::resource('banner', 'BannerController');
        Route::resource('info-kite', 'InfoKiteController');
        Route::resource('info-fashion', 'FashionController');
        Route::resource('info-kuliner', 'KulinerController');
        Route::resource('info-wisata', 'WisataController');
        Route::resource('info-jasa', 'JasaController');
        Route::resource('event-loker', 'EventLokerController');
        Route::resource('kelola-berita', 'NewsController');
        Route::resource('kategori-berita', 'CategoriesController');
        Route::resource('tagar-berita', 'TagsController');
    });

Route::prefix('merchant')
    ->namespace('Merchant')
    ->middleware(['auth', 'verified', 'merchant'])
    ->group(function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::resource('fashion', 'FashionController');
        Route::resource('kuliner', 'KulinerController');
        Route::resource('wisata', 'WisataController');
        Route::resource('jasa', 'JasaController');
    });

Auth::routes(['verify' => true]);
