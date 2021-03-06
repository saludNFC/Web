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

Route::model('usuario', 'App\User');

Route::bind('paciente', function($hc_cod){
    return \App\Patient::where('historia', $hc_cod)->firstOrFail();
});

Route::model('contacto', 'App\Contact');
Route::model('antecedentes', 'App\History');
Route::model('controles', 'App\Control');
Route::model('consultas', 'App\Consultation');

Route::resource('paciente', 'PatientController');

Route::resource('paciente.contacto', 'ContactController');
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
Route::get('api/search', 'SearchController@index');

// API Routes
Route::group(['prefix' => 'api'], function(){
    Route::post('auth', 'Api\ApiAuthController@authenticate');
    Route::get('auth', 'Api\ApiAuthController@getAuthenticatedUser');
    Route::get('logout', 'Api\ApiAuthController@logout');
    // Route::group(['middleware' => 'jwt.auth'], function(){
        Route::get('users', 'Api\ApiAuthController@index');
        Route::resource('usuario', 'Api\ApiUserController', ['except' => ['create', 'edit']]);
        Route::resource('paciente', 'Api\ApiPatientController', ['except' => ['create', 'edit']]);
        Route::resource('paciente.antecedentes', 'Api\ApiHistoryController', ['except' => ['create', 'edit']]);
        Route::resource('paciente.contacto', 'Api\ApiContactController', ['except' => ['create', 'edit']]);
        Route::resource('paciente.controles', 'Api\ApiControlController', ['except' => ['create', 'edit']]);
        Route::resource('paciente.consultas', 'Api\ApiConsultationController', ['except' => ['create', 'edit']]);
    // });
});
