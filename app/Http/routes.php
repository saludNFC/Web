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
Route::model('paciente', 'App\Patient');
Route::model('antecedentes', 'App\History');
Route::model('controles', 'App\Control');
Route::model('consultas', 'App\Consultation');

Route::resource('paciente', 'PatientController');

Route::resource('paciente.antecedentes', 'HistoryController');
Route::resource('paciente.controles', 'ControlController');
Route::resource('paciente.consultas', 'ConsultationController');

Route::auth();
Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');
