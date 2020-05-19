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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::resource('marcas', 'BrandController');
Route::resource('proveedores', 'ProviderController');
Route::resource('productos', 'ProductController');
Route::resource('imagenes', 'ImageController');

Route::resource('in_carts', 'ProducstInCartController',[
    "only"=> ['store','destroy']
]);

Route::get('/home', 'HomeController@index')->name('home');