<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    //one item belongs to one company
    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function reorder()
    {
        return $this->hasOne(ReOrder::class);
    }

    public function prices()
    {
        return $this->hasMany(ProductPrice::class);
    }

    protected $dates = ['deleted_at'];
}
