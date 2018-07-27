<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Company;
use App\tmpOS;
use App\ProductPrice;
use App\Stock;
use Carbon\Carbon;

class OpeningStockController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','roles']);
    }

    public function view(){
        $data = Company::find(Auth::user()->company_id);
        $tmpos = tmpOS::where('user_id', Auth::user()->id)->get();
        return view('home.inventory.opening-stock')
            ->with([
                'data' => $data,
                'tmpos' => $tmpos
            ]);
    }

    public function tmpInsert(Request $request){

        $tmpos = tmpOS::where([
                'user_id' => Auth::user()->id,
                'product_id' => $request->product_id,
                'cost_price' => $request->cost_price,
                'ws_price' => $request->ws_price,
                'sales_price' => $request->sales_price
            ])
            ->get()
            ->first();

        if($tmpos != null){
            $tmpos->qty = $tmpos->qty + $request->quantity;
            $tmpos->cost_price = $request->cost_price;
            $tmpos->ws_price = $request->ws_price;
            $tmpos->sales_price = $request->sales_price;
            $tmpos->update();
        }else{
            $tmpos = new tmpOS();
            $tmpos->user_id = Auth::user()->id;
            $tmpos->product_id = $request->product_id;
            $tmpos->qty = $request->quantity;
            $tmpos->cost_price = $request->cost_price;
            $tmpos->ws_price = $request->ws_price;
            $tmpos->sales_price = $request->sales_price;
            $tmpos->save();
        }


        $tmpos = tmpOS::where('user_id', Auth::user()->id)->get();

        if($request->ajax()){
            return view('shared.ajax.osdetails')
                ->with([
                    'tmpos' => $tmpos
                ]);
        }
    }

    public function tmpRemove(Request $request){
        // dd($request);
        $del_tmp = tmpOS::where('id', $request->id)->get()->first();
        $del_tmp->delete();

        $tmpos = tmpOS::where('user_id', Auth::user()->id)->get();

        if($request->ajax()){
            return view('shared.ajax.osdetails')
                    ->with([
                        'tmpos' => $tmpos
                    ]);
        }else{
            $data = Company::find(Auth::user()->company_id);
            return view('home.inventory.opening-stock')
                ->with([
                    'data' => $data,
                    'tmpos' => $tmpos
                ]);
        }

    }

    public function create(Request $request){
        $tmpos = tmpOS::where('user_id', Auth::user()->id)->get();
        
        if($tmpos->count() > 0){

            if($request->has('save')){
                foreach($tmpos as $t){
                    $price = ProductPrice::where([
                            'product_id' => $t->product_id,
                            'cost_price' => $t->cost_price,
                            'ws_price' => $t->ws_price,
                            'sale_price' => $t->sales_price
                        ])
                        ->get()
                        ->first();
    
                    $price_id;
                    
                    if($price != null){
                        $price_id = $price->id;
                        $price->grn_date = Carbon::now();
                        $price->update();
                    }else{
                        $price_id = ProductPrice::insertGetId([
                            'product_id' => $t->product_id,
                            'cost_price' => $t->cost_price,
                            'ws_price' => $t->ws_price,
                            'sale_price' => $t->sales_price,
                            'grn_date' => Carbon::now(),
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ]);
                    }
    
                    $stock = Stock::where([
                        'company_id' =>  Auth::user()->company_id,
                        'location_id' =>  $request->location_id,
                        'product_id' => $t->product_id,
                        'price_id' =>  $price_id
                    ])
                    ->get()
                    ->first();
    
    
                    if($stock != null){
                        $stock->shelf_qty = $stock->shelf_qty + $t->qty;
                        $stock->monthly_open_qty = $stock->monthly_open_qty + $t->qty;
                        $stock->update();
                    }else{
                        $stock = new Stock();
                        $stock->company_id = Auth::user()->company_id;
                        $stock->location_id = $request->location_id;
                        $stock->product_id = $t->product_id;
                        $stock->price_id = $price_id;
                        $stock->shelf_qty = $t->qty;
                        $stock->monthly_open_qty = $t->qty;
                        $stock->save();
                    }
                }

                $del_tmp = tmpOS::where('user_id', Auth::user()->id)->delete();
    
                return redirect()->back()->with([
                    'success'=> 'Opening Stock Added!'
                ]);
    
            }else if($request->has('cancel')){
                $del_tmp = tmpOS::where('user_id', Auth::user()->id)->delete();
    
                return redirect()->back();
            }
    
            return redirect()->back()->with([
                'error'=> 'Oops something went wrong!!'
            ]);
        }else{
            return redirect()->back()->with([
                'error'=> 'Empty Item List!!'
            ]);
        }
    }
}
