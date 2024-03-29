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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function () {
    return view('backend');
});
Route::get('dashboardfrontend', function () {   
    return view('dashboardfrontend');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/catagory', function () {
    return view('catagory');
});

Route::get('/single', function () {
    return view('single');
});

Route::get('/elements', function () {
    return view('elements');
});

Route::resource('kategori', 'KategoriController');
Route::resource('tag', 'TagController');
Route::resource('artikel', 'ArtikelController'); 


 //Route::get('berita-terakhir','FrontendAPIController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
