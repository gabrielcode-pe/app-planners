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


/**
 * --------------------------------------------------------------------------
 *  RUTAS SIN AUTENTICACIÓN
 * -----------------------------------------------------------------------
 */

Route::get('/', function () {
    return "Pagina principal";
});


Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register')->name('post.register');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('post.login');


// Mostrar formulario: Ingrese correo para recuperar
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Enviar el formulario
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Ruta para mostrar el formulario desde para restablece contraseña
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Ruta para guardar cambios de nueva contraseña
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');





/**
 * ----------------------------------------------------------------------------------
 * RUTAS QUE REQUIEREN AUNTENTICACIÓN
 * ----------------------------------------------------------------------------------
 */

Route::group(['middleware' => 'auth'], function () {
    
    Route::get('logout', 'Auth\LoginController@logout');
});