<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;
    
    //one department belongs to one company
    public function company(){
        return $this->belongsTo(Company::class);
    }

    //one department has many category
    public function category(){
        return $this->hasMany(Category::class);
    }

    protected $dates = ['deleted_at'];
}
