<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Company;
use App\Product;

class MProductPriceController extends Controller
{
    public function view(){
        $products = Company::find(Auth::user()->company_id)->products;
        return view('home.inventory.m-prices.m-product-price')
            ->with('products', $products);
    }

    public function prices($id){
        $prices = Product::find($id)->prices;
        // dd($prices);
        return view('home.inventory.m-prices.product-prices')
            ->with('prices' , $prices);
    }
}
