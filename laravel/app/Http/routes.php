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
Route::get('/',                         'AuthController@getLogin');
Route::post('/login',                   'AuthController@postLogin');
Route::get('admin/panel',               'AdminController@index');
Route::get('logout',
['as'=>'logout','uses' =>               'AuthController@getLogout']);

// ===== For Admin =====
// Users
Route::get('users',                     'AdminController@getUsers');
Route::get('/view_user/{id}',           'AdminController@getViewUser');
Route::get('users/form_add',            'AdminController@form_add');
Route::get('users/form_edit',           'AdminController@form_edit');
Route::get('users/form_delete',         'AdminController@form_delete');
Route::get('users/edit_user/{id}',      'AdminController@edit_user');
Route::get('users/form_edit_id/{id}',   'AdminController@form_edit_id');
Route::get('users/form_delete',         'AdminController@form_delete');
Route::get('users/delete_user/{id}',    'AdminController@delete_user');
Route::post('/insert_user',             'AdminController@insert_user');
Route::post('/save_edit',               'AdminController@save_edit');
// Report
Route::get('/admin/report',             'AdminController@getReport');
Route::get('/admin/send_report',        'AdminController@getSendReport');
Route::post('/admin/send_report',       'AdminController@postSendReport');
Route::get('/admin/edit_report',        'AdminController@getEditReport');
Route::get('/admin/edit_report/{id}',   'AdminController@getEditReportId');
Route::post('/admin/edit_report_id',    'AdminController@postEditReportId');
Route::get('/admin/delete_report',      'AdminController@getDeleteReport');
Route::get('/admin/delete_report/{id}', 'AdminController@getDeleteReportId');
// Project
Route::get('/admin/project/project',    'AdminController@getProject');
Route::get('/admin/project/view_project/{id}', 'AdminController@getViewProjectId');
Route::get('/admin/project/project_add', 'AdminController@getProjectAdd');
Route::post('/admin/project/project_add', 'AdminController@postProjectAdd');
Route::get('/admin/project/project_edit', 'AdminController@getProjectEdit');
Route::get('/admin/project/project_edit/{id}', 'AdminController@getProjectEditId');
Route::post('/admin/project/project_edit_id', 'AdminController@postProjectEditId');
Route::get('/admin/project/project_delete', 'AdminController@getProjectDelete');
Route::get('/admin/project/project_delete/{id}', 'AdminController@getProjectDeleteId');
// List
Route::get('/admin/list/list',            'AdminController@getList');
Route::get('/admin/list/view_list/{id}',  'AdminController@getViewList');
Route::get('/admin/list/list_add',        'AdminController@getListAdd');
Route::post('/admin/list/list_add',       'AdminController@postListAdd');
Route::get('/admin/list/list_edit',       'AdminController@getListEdit');
Route::get('/admin/list/list_edit/{id}',  'AdminController@getListEditId');
Route::post('/admin/list/list_edit',      'AdminController@postListEditId');
Route::get('/admin/list/list_delete',     'AdminController@getListDelete');
Route::get('/admin/list/list_delete/{id}','AdminController@getListDeleteId');
// Accounting
Route::get('/admin/accounting/accounting', 'AdminController@getAccounting');
Route::get('/admin/accounting/accounting_add', 'AdminController@getAccountingAdd');
Route::post('/admin/accounting/accounting_add', 'AdminController@postAccountingAdd');
Route::get('/admin/accounting/accounting_delete', 'AdminController@getAccountingDelete');
Route::get('/admin/accounting/accounting_delete/{id}', 'AdminController@getAccountingDeleteId');

// ===== For User =====
Route::get('home',                      'HomeController@index');
// Info
Route::get('/info_edit',                'HomeController@getInfoEdit');
Route::post('/save_info',               'HomeController@postInfoEdit');
// Report
Route::get('/report',                   'HomeController@getReport');
Route::get('/view_report/{id}',         'HomeController@getViewReport');
Route::get('/send_report',              'HomeController@getSendReport');
Route::post('/send_report',             'HomeController@postSendReport');
// Project
Route::get('/project',                  'HomeController@getProject');
Route::get('/view_project/{id}',        'HomeController@getViewProject');
Route::get('/project_add',              'HomeController@getProjectAdd');
Route::post('/project_add',             'HomeController@postProjectAdd');
Route::get('/project_edit',             'HomeController@getProjectEdit');
Route::get('/project_edit/{id}',        'HomeController@getProjectEditId');
Route::post('/project_edit',            'HomeController@postProjectEditId');
Route::get('/project_delete',           'HomeController@getProjectDelete');
Route::get('/project_delete/{id}',      'HomeController@getProjectDeleteId');
// List
Route::get('/list',                     'HomeController@getList');
Route::get('/view_list/{id}',           'HomeController@getViewList');
Route::get('/list_add',                 'HomeController@getListAdd');
Route::post('/list_add',                'HomeController@postListAdd');
Route::get('/list_edit',                'HomeController@getListEdit');
Route::get('/list_edit/{id}',           'HomeController@getListEditId');
Route::post('/list_edit',               'HomeController@postListEditId');
Route::get('/list_delete',              'HomeController@getListDelete');
Route::get('/list_delete/{id}',         'HomeController@getListDeleteId');
// Member
Route::get('/member',                   'HomeController@getMember');
Route::get('/view_member/{id}',         'HomeController@getViewMember');
Route::get('/member_add',               'HomeController@getMemberAdd');
Route::post('/member_add',              'HomeController@postMemberAdd');
Route::get('/member_edit',              'HomeController@getMemberEdit');
Route::get('/member_edit/{id}',         'HomeController@getMemberEditId');
Route::post('/member_edit_id',          'HomeController@postMemberEditId');
Route::get('/member_delete',            'HomeController@getMemberDelete');
Route::get('/member_delete/{id}',       'HomeController@getMemberDeleteId');
