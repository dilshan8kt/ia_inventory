<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;
    
    //one company has many users
    public function users(){
        return $this->hasMany(User::class);
    }

    //one company has many sub locations
    public function sublocations(){
        return $this->hasMany(SubLocation::class);
    }

    //one company has many department
    public function departments(){
        return $this->hasMany(Department::class);
    }

     //one company has many suppliers
     public function suppliers(){
        return $this->hasMany(Supplier::class);
    }

    public function category(){
        return $this->hasManyThrough(Category::class,Department::class);
    }
}
