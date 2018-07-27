<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodsReceiveNoteItem extends Model
{
    public function goods_receive_note(){
        return $this->belongsTo(GoodsReceiveNote::class);
    }
}
