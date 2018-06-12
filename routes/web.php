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
]);

Route::get('userimage/{filename}',[
    'uses' => 'UserController@getUserImage',
    'as' => 'image',
    'middleware' => 'roles',
    'roles' => ['Admin','Employee']
])->middleware('auth');

Route::get('suplier.category',[
    'uses' => 'SupplierController@getSupplierCategoryForm',
    'as' => 'suplier.category',
    'middleware' => 'roles',
    'roles' => ['Admin']
])->middleware('auth');