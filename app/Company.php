<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;
    
    //one company has many users
    public function users(){
        return $this->hasMany(User::class);
    }

    //one company has many sub locations
    public function sublocations(){
        return $this->hasMany(SubLocation::class);
    }

    //one company has many department
    public function departments(){
        return $this->hasMany(Department::class);
    }

    //one company has many categories
    public function categories(){
        return $this->hasMany(Category::class);
    }

    //one company has many suppliers
    public function suppliers(){
        return $this->hasMany(Supplier::class);
    }

    //one company has many units
    public function units(){
        return $this->hasMany(Unit::class);
    }

    public function category(){
        return $this->hasManyThrough(Category::class,Department::class);
    }

    //one company has many products
    public function products(){
        return $this->hasMany(Product::class);
    }

    //one company has many purchase order
    public function purchaseorders(){
        return $this->hasMany(PurchaseOrder::class);
    }

    public function goodsreceivenots(){
        return $this->hasMany(GoodsReceiveNote::class);
    }

    public function package(){
        return $this->hasOne(Package::class);
    }
}
