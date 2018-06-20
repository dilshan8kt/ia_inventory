<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubLocation extends Model
{
    use SoftDeletes;
    
    public function company(){
        return $this->belongsTo(Company::class);
    }

    protected $hidden = [
        'company_id'
    ];
}
