<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class PurchaseOrder extends Model
{
    //one item belongs to one company
    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function purchase_order_items(){
        return $this->hasMany(PurchaseOrderItems::class);
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
}
