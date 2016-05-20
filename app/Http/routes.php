<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route model binding, to make it pro!
// Route::model('route wildcard', 'Model')

// TEMPORARY DISABLED :3
Route::model('usuario', 'App\User');
Route::model('paciente', 'App\Patient');
Route::model('antecedentes', 'App\History');
Route::model('controles', 'App\Control');
Route::model('consultas', 'App\Consultation');

Route::resource('paciente', 'PatientController');

Route::resource('paciente.antecedentes', 'HistoryController');
Route::resource('paciente.controles', 'ControlController');
Route::resource('paciente.consultas', 'ConsultationController');

Route::auth();
Route::resource('usuario', 'UserController');

// Authentication Routes...
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

// Password Reset Routes...
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');
//
Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');

// API Routes
Route::group(['prefix' => 'api'], function(){
    Route::post('auth', 'Api\ApiAuthController@authenticate');
    Route::group(['middleware' => 'jwt.auth'], function(){
        Route::get('users', 'Api\ApiAuthController@index');
        Route::resource('usuario', 'Api\ApiUserController', ['except' => ['create', 'edit']]);
        Route::resource('paciente', 'Api\ApiPatientController', ['except' => ['create', 'edit']]);
        Route::resource('paciente.antecedentes', 'Api\ApiHistoryController', ['except' => ['create', 'edit']]);
        Route::resource('paciente.controles', 'Api\ApiControlController', ['except' => ['create', 'edit']]);
        Route::resource('paciente.consultas', 'Api\ApiConsultationController', ['except' => ['create', 'edit']]);
    });
});
