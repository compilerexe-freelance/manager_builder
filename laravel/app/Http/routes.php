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
Route::get('/',                       'AuthController@getLogin');
Route::post('/login',                 'AuthController@postLogin');
Route::get('admin_panel',             'AdminController@index');
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
