<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MunicipioController;
use Illuminate\Foundation\Auth\RegistersUsers;

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

Route::post('/econtrar-cidade', 'MunicipioController@BuscarCidade')->name('buscar-cidade');


Route::fallback(function(){
    return "Deu Erro !!";
});

// Route::get('/register', [RegisterController::class, 'edit'])->name('usuario-edit');
