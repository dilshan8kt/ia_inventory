<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrderItems extends Model
{
    public function purchase_order(){
        return $this->belongsTo(PurchaseOrder::class);
    }
}
