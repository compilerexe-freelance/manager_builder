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
Route::get('logout',
['as'=>'logout','uses' =>             'AuthController@getLogout']);

// ===== For Admin =====
// UsersController
Route::get('users/form_add',          'AdminController@form_add');
Route::get('users/form_edit',         'AdminController@form_edit');
Route::get('users/form_delete',       'AdminController@form_delete');
Route::get('users/edit_user/{id}',    'AdminController@edit_user');
Route::get('users/form_edit_id/{id}', 'AdminController@form_edit_id');
Route::get('users/form_delete',       'AdminController@form_delete');
Route::get('users/delete_user/{id}',  'AdminController@delete_user');
Route::post('/insert_user',           'AdminController@insert_user');
Route::post('/save_edit',             'AdminController@save_edit');

// ===== For User =====
Route::get('home',                    'HomeController@index');
// Report
Route::get('/report',                 'HomeController@getReport');
Route::get('/view_report/{id}',       'HomeController@getViewReport');
Route::get('/send_report',            'HomeController@getSendReport');
Route::post('/send_report',           'HomeController@postSendReport');
// Project
Route::get('/project',                'HomeController@getProject');
Route::get('/view_project/{id}',      'HomeController@getViewProject');
Route::get('/project_add',            'HomeController@getProjectAdd');
Route::post('/project_add',           'HomeController@postProjectAdd');
Route::get('/project_edit',           'HomeController@getProjectEdit');
Route::get('/project_edit/{id}',      'HomeController@getProjectEditId');
Route::post('/project_edit',          'HomeController@postProjectEditId');
Route::get('/project_delete',         'HomeController@getProjectDelete');
Route::get('/project_delete/{id}',    'HomeController@getProjectDeleteId');
// List
Route::get('/list',                   'HomeController@getList');
Route::get('/view_list/{id}',         'HomeController@getViewList');
Route::get('/list_add',               'HomeController@getListAdd');
Route::post('/list_add',              'HomeController@postListAdd');
Route::get('/list_edit',              'HomeController@getListEdit');
Route::get('/list_edit/{id}',         'HomeController@getListEditId');
Route::post('/list_edit',             'HomeController@postListEditId');
Route::get('/list_delete',            'HomeController@getListDelete');
Route::get('/list_delete/{id}',       'HomeController@getListDeleteId');
