<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //one company has many users
    public function user(){
        return $this->hasMany(User::class);
    }

    //one company has many sub locations
    public function sublocation(){
        return $this->hasMany(SubLocation::class);
    }

    //one company has many department
    public function department(){
        return $this->hasMany(Department::class);
    }
}
