<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\ProductPrice;
use App\Company;
use App\User;
use JWTAuth;

class POSController extends Controller
{
    public function apiGet_users(){
        $users = Company::find(User::find(JWTAuth::parseToken()->toUser()->id)->company->id)->users;
        
        return response()->json(
            $users
        ,200);
    }


    public function apiGet_products(){
        $products = Company::find(User::find(JWTAuth::parseToken()->toUser()->id)->company->id)->products;

        return response()->json(
            $products
        ,200);
    }

    public function apiGet_prices(){
        $prices = Company::find(User::find(JWTAuth::parseToken()->toUser()->id)->company->id)->prices;
        
        return response()->json(
            $prices
        ,200);
    }
}
