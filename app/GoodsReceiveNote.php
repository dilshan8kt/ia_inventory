<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodsReceiveNote extends Model
{
    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function sublocation(){
        return $this->belongsTo(SubLocation::class);
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
}
