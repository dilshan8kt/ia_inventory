<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Company;
use App\Product;
use App\ProductPrice;
use App\tmpPO;

class PurchaseOrderController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','roles']);
    }
    
    public function view(Request $request){
        $products = Company::find(Auth::user()->company_id)->products;
        $tmppo = tmpPO::where('user_id', Auth::user()->id)->get();

        if($request->ajax()){
            if($request->product_id != null){
                $product = Product::where('id', $request->product_id)->get();
                $price = ProductPrice::where('product_id', $request->product_id)->get();
                if($product != null){
                    if($price != null){
                        return new Response([$product,$price], 200);
                    }else{
                        $price = "0.00";
                        return new Response([$product,$price], 200);
                    }
                }
            }
        }

        return view('home.inventory.po.purchase-order')
            ->with([
                'products' => $products,
                'tmppo' => $tmppo
            ]);
    }

    public function tmpInsert(Request $request){
        // if($request->ajax()){
            $tmp = tmpPO::where('product_id', $request->product_id)
                ->where('user_id', Auth::user()->id)
                ->get()->first();
            if($tmp != null){
                $tmp->quantity += $request->input('quantity');
                $tmp->update();
            }else{
                // dd($request);
                $tmppo = new tmpPO();
                $tmppo->user_id = Auth::user()->id;
                $tmppo->product_id = $request->input('product_id');
                $tmppo->quantity = $request->input('quantity');
                $tmppo->unit_price = $request->input('unit_price');
                $tmppo->save();
            }

            $tmppo = tmpPO::where('user_id', Auth::user()->id)->get();
            
            $total = 0;

            foreach($tmppo as $t){
                $total += ($t->unit_price * $t->quantity);
            }

            // dd($total);
            // return view('shared.modal.ajax.podetails')
            //     ->with('tmppo', $tmppo);
            // return new Response($tmppo, 200);
            return redirect()->back()
                ->with([
                    'tmppo' => $tmppo,
                    'total' => $total
                ]);
        // }
    }
}
