<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReOrder extends Model
{
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
