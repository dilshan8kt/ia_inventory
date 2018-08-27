<?php

Route::post('insertSupplier', [
    'uses' => 'api\SupplierController@apiPost'
]);

Route::post('signin', [
    'uses' => 'api\apiAuthController@signin'
]);

Route::get('getPOS_users',[
    'uses' => 'api\POSController@apiGet_users',
    'middleware' => 'auth.jwt'
]);

Route::get('getPOS_products',[
    'uses' => 'api\POSController@apiGet_products',
    'middleware' => 'auth.jwt'
]);

Route::get('getPOS_prices',[
    'uses' => 'api\POSController@apiGet_prices',
    'middleware' => 'auth.jwt'
]);