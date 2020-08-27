<?php

use Facade\FlareClient\Api;
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

Route::resource('students', 'StudentsController');
Route::resource('cursos', 'CursosController');
Route::get('/api/{cep}', 'ConsulteCep@consulte');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/delete', function () {
});
Route::get('/edit', function () {
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cursos', 'CursosController@index');
Route::post('/cursos/{idCursos}', 'CursosController@update');
Route::get('/cursos/{idCursos}/edit', 'CursosController@edit');
Route::get('/cursos/{idCursos}/delete', 'CursosController@destroy');
Route::post('/students/{idUsuario}', 'StudentsController@update');
Route::get('/students/{idUsuario}/edit', 'StudentsController@edit');
Route::get('/students/{idUsuario}/delete', 'StudentsController@destroy');
Route::get('/importarXml', function () {
    return view('xml.import-xml');
});
Route::post('/importarXml', 'CursosController@importXml')->name('importarXml');
