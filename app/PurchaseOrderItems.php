<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrderItems extends Model
{
    public function purchase_order(){
        return $this->belongsTo(PurchaseOrder::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function getProduct($id){
        return Product::where('id', $id)->get()->first();
    }
}
