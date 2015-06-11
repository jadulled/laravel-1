<?php


Route::get('/admin', ['as' => 'admin.index', 'uses' => 'Admin\AdminController@index']);

Route::resource('admin/users', 'Admin\UsersController');
