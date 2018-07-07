<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    //one item belongs to one company
    public function company(){
        return $this->belongsTo(Company::class);
    }
}
