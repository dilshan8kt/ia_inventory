<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    public function department(){
        return $this->belongsTo(Department::class);
    }

    protected $dates = ['deleted_at'];
}
