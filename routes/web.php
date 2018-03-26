<?php
use App\Flower;

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
Route::get('flowers', 'FlowersController@index');
Route::get('flowers/add', 'FlowersController@add');
Route::any('flowers/store', 'FlowersController@store');
Route::get('flowers/{nume}', 'FlowersController@show');
