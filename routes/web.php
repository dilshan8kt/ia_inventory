<?php

Route::view('/', 'index');
Route::view('/login', 'auth.login')->name('login');

Route::get('dashboard', [
    'uses' => 'HomeController@view',
    'as' => 'dashboard',
    'middleware' => 'roles',
    'roles' => ['Admin','User']
]);

Route::post('signin',[
    'uses' => 'AuthController@signin',
    'as' => 'signin'
]);

Route::get('signout',[
    'uses' => 'AuthController@signout',
    'as' => 'signout'
]);

Route::get('userimage/{filename}',[
    'uses' => 'UserController@getUserImage',
    'as' => 'image',
    'roles' => ['Admin','User']
]);

Route::get('sublocation',[
    'uses' => 'SubLocationController@view',
    'as' => 'sublocation',
    'roles' => ['Admin']
]);

Route::post('sublocation',[
    'uses' => 'SubLocationController@insert',
    'as' => 'sublocation',
    'roles' => ['Admin']
]);

Route::put('sublocation',[
    'uses' => 'SubLocationController@update',
    'as' => 'sublocation',
    'roles' => ['Admin']
]);

Route::delete('sublocation',[
    'uses' => 'SubLocationController@delete',
    'as' => 'sublocation',
    'roles' => ['Admin']
]);

Route::get('supplier',[
    'uses' => 'SupplierController@view',
    'as' => 'supplier',
    'roles' => ['Admin']
]);

Route::post('supplier',[
    'uses' => 'SupplierController@insert',
    'as' => 'supplier',
    'roles' => ['Admin']
]);

Route::delete('supplier',[
    'uses' => 'SupplierController@delete',
    'as' => 'supplier',
    'roles' => ['Admin']
]);

Route::put('supplier',[
    'uses' => 'SupplierController@edit',
    'as' => 'supplier',
    'roles' => ['Admin']
]);

Route::get('department',[
    'uses' => 'DepartmentController@view',
    'as' => 'department',
    'roles' => ['Admin']
]);

Route::delete('department',[
    'uses' => 'DepartmentController@delete',
    'as' => 'department',
    'roles' => ['Admin']
]);

Route::put('department',[
    'uses' => 'DepartmentController@edit',
    'as' => 'department',
    'roles' => ['Admin']
]);

Route::post('department',[
    'uses' => 'DepartmentController@insert',
    'as' => 'department',
    'roles' => ['Admin']
]);

Route::get('category',[
    'uses' => 'CategoryController@view',
    'as' => 'category',
    'roles' => ['Admin']
]);

Route::post('category',[
    'uses' => 'CategoryController@insert',
    'as' => 'category',
    'roles' => ['Admin']
]);

Route::delete('category',[
    'uses' => 'CategoryController@delete',
    'as' => 'category',
    'roles' => ['Admin']
]);

Route::put('category',[
    'uses' => 'CategoryController@edit',
    'as' => 'category',
    'roles' => ['Admin']
]);