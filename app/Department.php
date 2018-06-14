<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //one department belongs to one company
    public function company(){
        return $this->belongsTo(Company::class);
    }

    //one department has many category
    public function category(){
        return $this->hasMany(Category::class);
    }
}
