<?php

Route::get('api_suppliers', [
    'uses' => 'SupplierController@apiGet'
]);
