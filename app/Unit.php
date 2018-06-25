<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    //one unit belongs to one company
    public function company(){
        return $this->belongsTo(Company::class);
    }
}
