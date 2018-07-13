<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Company;
use App\Product;
use App\ProductPrice;
use App\tmpPO;
use Carbon;

class PurchaseOrderController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','roles']);
    }
    
    public function view(Request $request){
        $products = Company::find(Auth::user()->company_id)->products;
        $suppliers = Company::find(Auth::user()->company_id)->suppliers;
        $tmppo = tmpPO::where('user_id', Auth::user()->id)->get();
        // dd($suppliers);
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
                'suppliers' => $suppliers,
                'tmppo' => $tmppo
            ]);
    }

    public function tmpInsert(Request $request){
        
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

            if($request->ajax()){
                return view('shared.modal.ajax.podetails')
                    ->with([
                        'tmppo' => $tmppo,
                        'total', $total
                    ]);
            }

            return redirect()->back()
                ->with([
                    'tmppo' => $tmppo,
                    'total' => $total
                ]);
        
    }

    public function create(Request $request){
        if($request->has('save')){
            dd('save');
        }else if($request->has('pdf')){
            dd('pdf');
        }else if($request->has('print')){
            dd('print');
        }else if($request->has('cancel')){
            dd('cancel');
        }
        dd($request);
    }
}
