<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductPrice extends Model
{
    use SoftDeletes;

    public function product(){
        return $this->belongsTo(Product::class);
    }

    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];
    protected $dates = ['deleted_at'];
}
