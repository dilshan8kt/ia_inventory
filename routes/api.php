<?php

Route::get('getSuppliers', [
    'uses' => 'api\SupplierController@apiGet',
    'middleware' => 'auth.jwt'
]);


Route::post('insertSupplier', [
    'uses' => 'api\SupplierController@apiPost'
]);

Route::post('signin', [
    'uses' => 'api\apiAuthController@signin'
]);