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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/settings','UserController@settings')->name('settings');

Route::middleware(['auth:sanctum', 'verified'])->post('/user/update','UserController@update')->name('user.update');

Route::middleware(['auth:sanctum', 'verified'])->get('/user/avatar/{filename}','UserController@getImage')->name('user.avatar');

Route::middleware(['auth:sanctum', 'verified'])->get('/create-image','ImageController@create')->name('image.create');

Route::middleware(['auth:sanctum', 'verified'])->post('/image/save','ImageController@save')->name('image.save');

