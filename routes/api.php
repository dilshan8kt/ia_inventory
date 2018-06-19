<?php

Route::get('getSuppliers', [
    'uses' => 'api\SupplierController@apiGet'
]);


Route::post('insertSupplier', [
    'uses' => 'api\SupplierController@apiPost'
]);