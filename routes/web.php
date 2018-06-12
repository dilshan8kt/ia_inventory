<?php

Route::view('/', 'index');
Route::view('/login', 'auth.login')->name('login');

Route::get('dashboard', [
    'uses' => 'HomeController@getDashboardForm',
    'as' => 'dashboard',
    'middleware' => 'roles',
    'roles' => ['Admin','User']
])->middleware('auth');

Route::post('signin',[
    'uses' => 'AuthController@signin',
    'as' => 'signin'
]);

Route::get('signout',[
    'uses' => 'AuthController@signout',
    'as' => 'signout'
])->middleware('auth');

Route::get('userimage/{filename}',[
    'uses' => 'UserController@getUserImage',
    'as' => 'image',
    'middleware' => 'roles',
    'roles' => ['Admin','Employee']
])->middleware('auth');

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
])->middleware('auth');