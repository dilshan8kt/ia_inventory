<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Company;

class PurchaseOrderController extends Controller
{
    public function view(Request $request){
        $products = Company::find(Auth::user()->company_id)->products;

        if($request->ajax()){
            if($request->product_id != null){
                $product = DB::table('products')->where('id', '=', $request->product_id)->get();
                if($product != null){
                    return new Response($product, 200);
                }
            }
        }

        return view('home.master.inventory.po.purchase-order')
            ->with([
                'products' => $products
            ]);
    }
}
