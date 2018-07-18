<?php

Route::view('/', 'index');
Route::view('/login', 'auth.login')->name('login');

Route::get('dashboard', [
    'uses' => 'HomeController@view',
    'as' => 'dashboard',
    'roles' => ['Admin','User']
]);

//profile
Route::get('profile', [
    'uses' => 'UserController@profile',
    'as' => 'profile',
    'roles' => ['Admin','User']
]);

Route::put('profile', [
    'uses' => 'UserController@edit',
    'as' => 'profile',
    'roles' => ['Admin','User']
]);
//end profile


Route::post('changepassword',[
    'uses' => 'UserController@changePassword',
    'as' => 'changepassword',
    'roles' => ['Admin']
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

Route::get('product',[
    'uses' => 'ProductController@view',
    'as' => 'product',
    'roles' => ['Admin','User']
]);

Route::post('product',[
    'uses' => 'ProductController@insert',
    'as' => 'product',
    'roles' => ['Admin','User']
]);

Route::put('product',[
    'uses' => 'ProductController@edit',
    'as' => 'product',
    'roles' => ['Admin','User']
]);

Route::delete('product',[
    'uses' => 'ProductController@delete',
    'as' => 'product',
    'roles' => ['Admin','User']
]);

Route::get('stock',[
    'uses' => 'StockController@view',
    'as' => 'stock',
    'roles' => ['Admin','User']
]);

Route::get('purchase-order',[
    'uses' => 'PurchaseOrderController@view',
    'as' => 'purchase-order',
    'roles' => ['Admin','User']
]);

Route::post('purchase-order',[
    'uses' => 'PurchaseOrderController@create',
    'as' => 'purchase-order',
    'roles' => ['Admin','User']
]);

Route::get('users',[
    'uses' => 'UserController@view',
    'as' => 'users',
    'roles' => ['Admin','User']
]);

Route::post('user',[
    'uses' => 'UserController@create',
    'as' => 'user',
    'roles' => ['Admin']
]);

Route::delete('user',[
    'uses' => 'UserController@delete',
    'as' => 'user',
    'roles' => ['Admin']
]);

Route::post('tmp-po', [
    'uses' => 'PurchaseOrderController@tmpInsert',
    'as' => 'tmp-po'
]);

Route::delete('tmp-po', [
    'uses' => 'PurchaseOrderController@tmpRemove',
    'as' => 'tmp-po'
]);