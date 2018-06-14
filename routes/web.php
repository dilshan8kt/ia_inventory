<?php

Route::view('/', 'index');
Route::view('/login', 'auth.login')->name('login');

Route::get('dashboard', [
    'uses' => 'HomeController@getDashboardForm',
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
    'middleware' => 'roles',
    'roles' => ['Admin','User']
]);

Route::get('supplier.category',[
    'uses' => 'SupplierCategoryController@getSupplierCategory',
    'as' => 'supplier.category',
    'middleware' => 'roles',
    'roles' => ['Admin']
])->middleware('auth');

Route::post('supplier.category',[
    'uses' => 'SupplierCategoryController@postSupplierCategory',
    'as' => 'supplier.category',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::get('supplier',[
    'uses' => 'SupplierController@getSupplier',
    'as' => 'supplier',
    'middleware' => 'roles',
    'roles' => ['Admin']
])->middleware('auth');

Route::get('sublocation',[
    'uses' => 'SubLocationController@getSubLocation',
    'as' => 'sublocation',
    'roles' => ['Admin']
]);

Route::post('sublocation',[
    'uses' => 'SubLocationController@postSubLocation',
    'as' => 'sublocation',
    'roles' => ['Admin']
]);