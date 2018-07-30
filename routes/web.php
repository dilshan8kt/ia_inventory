<?php

Route::view('/', 'index');
Route::view('/login', 'auth.login')->name('login');

Route::get('dashboard', [
    'uses' => 'HomeController@view',
    'as' => 'dashboard',
    'roles' => ['Super Admin','Admin','User']
]);

//profile
Route::get('profile', [
    'uses' => 'UserController@profile',
    'as' => 'profile',
    'roles' => ['Super Admin','Admin','User']
]);

Route::put('profile', [
    'uses' => 'UserController@edit',
    'as' => 'profile',
    'roles' => ['Super Admin','Admin','User']
]);
//end profile


Route::post('changepassword',[
    'uses' => 'UserController@changePassword',
    'as' => 'changepassword',
    'roles' => ['Super Admin','Admin']
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
    'as' => 'image'
]);

Route::get('sublocation',[
    'uses' => 'SubLocationController@view',
    'as' => 'sublocation',
    'roles' => ['Super Admin','Admin']
]);

Route::post('sublocation',[
    'uses' => 'SubLocationController@insert',
    'as' => 'sublocation',
    'roles' => ['Super Admin','Admin']
]);

Route::put('sublocation',[
    'uses' => 'SubLocationController@update',
    'as' => 'sublocation',
    'roles' => ['Super Admin','Admin']
]);

Route::delete('sublocation',[
    'uses' => 'SubLocationController@delete',
    'as' => 'sublocation',
    'roles' => ['Super Admin','Admin']
]);

Route::get('supplier',[
    'uses' => 'SupplierController@view',
    'as' => 'supplier',
    'roles' => ['Super Admin','Admin']
]);

Route::post('supplier',[
    'uses' => 'SupplierController@insert',
    'as' => 'supplier',
    'roles' => ['Super Admin','Admin']
]);

Route::delete('supplier',[
    'uses' => 'SupplierController@delete',
    'as' => 'supplier',
    'roles' => ['Super Admin','Admin']
]);

Route::put('supplier',[
    'uses' => 'SupplierController@edit',
    'as' => 'supplier',
    'roles' => ['Super Admin','Admin']
]);

Route::get('department',[
    'uses' => 'DepartmentController@view',
    'as' => 'department',
    'roles' => ['Super Admin','Admin']
]);

Route::delete('department',[
    'uses' => 'DepartmentController@delete',
    'as' => 'department',
    'roles' => ['Super Admin','Admin']
]);

Route::put('department',[
    'uses' => 'DepartmentController@edit',
    'as' => 'department',
    'roles' => ['Super Admin','Admin']
]);

Route::post('department',[
    'uses' => 'DepartmentController@insert',
    'as' => 'department',
    'roles' => ['Super Admin','Admin']
]);

Route::get('category',[
    'uses' => 'CategoryController@view',
    'as' => 'category',
    'roles' => ['Super Admin','Admin']
]);

Route::post('category',[
    'uses' => 'CategoryController@insert',
    'as' => 'category',
    'roles' => ['Super Admin','Admin']
]);

Route::delete('category',[
    'uses' => 'CategoryController@delete',
    'as' => 'category',
    'roles' => ['Super Admin','Admin']
]);

Route::put('category',[
    'uses' => 'CategoryController@edit',
    'as' => 'category',
    'roles' => ['Super Admin','Admin']
]);

Route::get('product',[
    'uses' => 'ProductController@view',
    'as' => 'product',
    'roles' => ['Super Admin','Admin','User']
]);

Route::post('product',[
    'uses' => 'ProductController@insert',
    'as' => 'product',
    'roles' => ['Super Admin','Admin','User']
]);

Route::put('product',[
    'uses' => 'ProductController@edit',
    'as' => 'product',
    'roles' => ['Super Admin','Admin','User']
]);

Route::delete('product',[
    'uses' => 'ProductController@delete',
    'as' => 'product',
    'roles' => ['Super Admin','Admin','User']
]);

Route::get('stock-adjustment',[
    'uses' => 'StockAdjustmentController@view',
    'as' => 'stock-adjustment',
    'roles' => ['Super Admin','Admin','User']
]);

Route::get('purchase-order',[
    'uses' => 'PurchaseOrderController@view',
    'as' => 'purchase-order',
    'roles' => ['Super Admin','Admin','User']
]);

Route::get('purchase-orders',[
    'uses' => 'PurchaseOrderController@getPO',
    'as' => 'purchase-orders',
    'roles' => ['Super Admin','Admin','User']
]);

Route::get('purchase-order/pdf/{id}',[
    'uses' => 'PurchaseOrderController@pdf',
    'roles' => ['Super Admin','Admin','User']
]);

Route::post('purchase-order',[
    'uses' => 'PurchaseOrderController@create',
    'as' => 'purchase-order',
    'roles' => ['Super Admin','Admin','User']
]);

Route::get('users',[
    'uses' => 'UserController@view',
    'as' => 'users',
    'roles' => ['Super Admin','Admin','User']
]);

Route::post('user',[
    'uses' => 'UserController@create',
    'as' => 'user',
    'roles' => ['Super Admin','Admin']
]);

Route::delete('user',[
    'uses' => 'UserController@delete',
    'as' => 'user',
    'roles' => ['Super Admin','Admin']
]);

Route::post('tmp-po', [
    'uses' => 'PurchaseOrderController@tmpInsert',
    'as' => 'tmp-po'
]);

Route::delete('tmp-po', [
    'uses' => 'PurchaseOrderController@tmpRemove',
    'as' => 'tmp-po'
    ]);

    Route::get('opening-stock',[
    'uses' => 'OpeningStockController@view',
    'as' => 'opening-stock',
    'roles' => ['Super Admin','Admin']
]);

Route::post('opening-stock',[
    'uses' => 'OpeningStockController@create',
    'as' => 'opening-stock',
    'roles' => ['Super Admin','Admin']
]);

Route::post('tmp-os', [
    'uses' => 'OpeningStockController@tmpInsert',
    'as' => 'tmp-os'
]);

Route::delete('tmp-os', [
    'uses' => 'OpeningStockController@tmpRemove',
    'as' => 'tmp-os'
]);

Route::get('goods-receive-note',[
    'uses' => 'GoodsReceiveNoteController@view',
    'as' => 'goods-receive-note',
    'roles' => ['Super Admin','Admin']
]);

Route::post('tmp-grn', [
    'uses' => 'GoodsReceiveNoteController@tmpInsert',
    'as' => 'tmp-grn'
]);

Route::delete('tmp-grn', [
    'uses' => 'GoodsReceiveNoteController@tmpRemove',
    'as' => 'tmp-grn'
]);

Route::post('goods-receive-note',[
    'uses' => 'GoodsReceiveNoteController@create',
    'as' => 'goods-receive-note',
    'roles' => ['Super Admin','Admin','User']
]);

Route::get('goods-receive-note/pdf/{id}',[
    'uses' => 'GoodsReceiveNoteController@pdf',
    'roles' => ['Super Admin','Admin','User']
]);

// Route::prefix('site')->group(function(){
    Route::get('site.dashboard', [
        'uses' => 'site\HomeController@view',
        'as' => 'site.dashboard'
    ]);
    
    Route::get('site.clients', [
        'uses' => 'site\ClientController@view',
        'as' => 'site.clients'
    ]);
    
    Route::post('site.client', [
        'uses' => 'site\ClientController@create',
        'as' => 'site.client'
    ]);
// });