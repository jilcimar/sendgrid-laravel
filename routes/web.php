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

/*
|--------------------------------------------------------------------------
|Route Test
|--------------------------------------------------------------------------
| Test path, here '/mail' calls the 'sendMail' function created in our class 'Controller.php'
| Rota de teste, aqui '/mail' chama a função 'sendMail' criada na nossa classe 'Controller.php'
*/
Route::get('/mail', 'Controller@sendMail');
