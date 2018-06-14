<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubLocation extends Model
{
    public function company(){
        return $this->belongsTo(Company::class);
    }
}
