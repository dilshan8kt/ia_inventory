<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tmpGRN extends Model
{
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
