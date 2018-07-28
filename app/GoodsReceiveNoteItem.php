<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodsReceiveNoteItem extends Model
{
    public function goods_receive_note(){
        return $this->belongsTo(GoodsReceiveNote::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function getProduct($id){
        return Product::where('id', $id)->get()->first();
    }
}
