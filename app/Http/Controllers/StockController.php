<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Company;

class StockController extends Controller
{
    public function view(Request $request){
        $items = Company::find(Auth::user()->company_id)->products;

        // if($request->ajax()){
        //     if($request->item_id != null){
        //         $item = DB::table('products')->where('id', '=', $request->item_id)->get();
        //         if($item != null){
        //             return new Response($item, 200);
        //         }
        //     }
        // }
        return view('home.master.products.stock')
            ->with([
                'items' => $items
            ]);
    }
}
