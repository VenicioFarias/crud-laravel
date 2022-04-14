<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\RegisterController;

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
Route::get('/user/create', 'UserController@create')->name('usuario-create');
Route::post('/', 'UserController@store')->name('usuario-store');
Route::get('/user/{id}/edit','UserController@edit')->name('usuario-edit');
Route::put('/{id}', 'UserController@update')->name('usuario-update');
Route::delete('/{id}', 'UserController@destroy')->name('usuario-delete');

Route::fallback(function(){
    return "Deu Erro !!";
});

// Route::get('/register', [RegisterController::class, 'edit'])->name('usuario-edit');
