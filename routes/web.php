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