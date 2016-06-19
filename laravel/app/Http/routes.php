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

// Auth
Route::get('/',                                  'AuthController@getLogin');
Route::post('/login',                            'AuthController@postLogin');
Route::get('admin_panel',                        'AdminController@index');
Route::get('logout',['as'=>'logout','uses' =>    'AuthController@getLogout']);

// UsersController
Route::get('users/form_add',          'UsersController@form_add');
Route::get('users/form_edit',         'UsersController@form_edit');
Route::get('users/form_delete',       'UsersController@form_delete');
Route::get('users/edit_user/{id}',    'UsersController@edit_user');
Route::get('users/form_edit_id/{id}', 'UsersController@form_edit_id');
Route::get('users/form_delete',       'UsersController@form_delete');
Route::get('users/delete_user/{id}',  'UsersController@delete_user');
Route::post('/insert_user',           'UsersController@insert_user');
Route::post('/save_edit',             'UsersController@save_edit');

// Home for user
Route::get('home',                    'HomeController@index');
// Report
Route::get('/report',                 'HomeController@getReport');
Route::get('/send_report',            'HomeController@getSendReport');
Route::post('/send_report',           'HomeController@postSendReport');
Route::get('/view_report/{id}',       'HomeController@getViewReport');
// Project
Route::get('/project',                'HomeController@getProject');
Route::get('/view_project/{id}',      'HomeController@getViewProject');
Route::get('/project_add',            'HomeController@getProjectAdd');
Route::post('/project_add',           'HomeController@postProjectAdd');
Route::get('/project_edit',           'HomeController@getProjectEdit');
Route::get('/project_edit/{id}',      'HomeController@getProjectEditId');
Route::post('/project_edit',          'HomeController@postProjectEditId');
Route::get('/project_delete',         'HomeController@getProjectDelete');
Route::get('/project_delete/{id}',     'HomeController@getProjectDeleteId');
