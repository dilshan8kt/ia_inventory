<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use SoftDeletes;
    
    //one supplier belongs to one company
    public function company(){
        return $this->belongsTo(Company::class);
    }

    protected $dates = ['deleted_at'];
}
