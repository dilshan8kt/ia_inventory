<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Company;
use App\ProductPrice;
use App\GoodsReceiveNote;
use App\GoodsReceiveNoteItem;
use App\tmpGRN;
use App\Stock;
use Carbon\Carbon;
use PDF;

class GoodsReceiveNoteController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','roles']);
    }

    public function view(Request $request){
        $data = Company::find(Auth::user()->company_id);
        $tmpgrn = tmpGRN::where('user_id', Auth::user()->id)->get();

        if($request->ajax()){
            $price = ProductPrice::where('product_id', $request->product_id)->get()->last();

            if($price != null){
                return new Response([$price], 200);
            }
        }

        return view('home.inventory.grn.goods_receive_note')
            ->with([
                'data' => $data,
                'tmpgrn' => $tmpgrn
            ]);
    }

    public function tmpInsert(Request $request){
        // dd($request);
        $tmpgrn = new tmpGRN();
        $tmpgrn->user_id = Auth::user()->id;
        $tmpgrn->product_id = $request->product_id;
        $tmpgrn->qty = $request->qty;
        $tmpgrn->free_qty = $request->free_qty;
        $tmpgrn->unit_price = $request->unit_price;
        $tmpgrn->sales_price = $request->sales_price;
        $tmpgrn->dis_p = $request->dis_p;
        $tmpgrn->dis_amt = $request->dis_a;
        $tmpgrn->save();

        $tmpgrn = tmpGRN::where([
                'user_id' => Auth::user()->id
            ])
            ->get();

        if($request->ajax()){
            return view('shared.ajax.grndetails')->with([
                'tmpgrn' => $tmpgrn
            ]);
        }

        return redirect()->back()->with([
            'tmpgrn' => $tmpgrn
        ]);
    }

    public function tmpRemove(Request $request){
        $del_tmp = tmpGRN::where('id', $request->id)->get()->first();
        $del_tmp->delete();

        $tmpgrn = tmpGRN::where('user_id', Auth::user()->id)->get();

        if($request->ajax()){
            return view('shared.ajax.grndetails')
                    ->with([
                        'tmpgrn' => $tmpgrn
                    ]);
        }else{
            $data = Company::find(Auth::user()->company_id);
            return view('home.inventory.grn.goods_receive_note')
                ->with([
                    'data' => $data,
                    'tmpos' => $tmpgrn
                ]);
        }
    }

    public function create(Request $request){
        // dd($request);

        $net_amount = 0;

        //grn code begin
        
        
        if($request->has('save')){
            $tmpgrn = tmpGRN::where('user_id', Auth::user()->id)->get();

            if($tmpgrn->count() > 0){
                $carbon = Carbon::now();
                $grn = Company::find(Auth::user()->company_id)->goodsreceivenots->last();
        
                $split_year = substr($carbon->year, 2);
                
                if($grn != null){
                    $split_code = explode("-",$grn->code, 3);
        
                    if($split_code[1] == $split_year){
                        $code = $split_code[2]+1;
                    }else{
                        $code = "001";
                    }
                    
                    if(strlen($code) === 1){
                        $code = '00'.$code;
                    }else if(strlen($code) === 2){
                        $code = '0'.$code;
                    }
        
                    $code ="GRN-". $split_year ."-". $code;
                }else{
                    $code ="GRN-". $split_year ."-001";
                }
                //grn code end

                foreach($tmpgrn as $tgrn){
                    $net_amount += (($tgrn->unit_price * $tgrn->qty) - $tgrn->dis_amt);
                }

                //insert grn and get id
                $grn_id = GoodsReceiveNote::insertGetId([
                    'company_id' => Auth::user()->company_id,
                    'location_id' => $request->location_id,
                    'supplier_id' => $request->supplier_id,
                    'code' => $code,
                    'invoice_no' => $request->invoice_no,
                    'date' => $request->grn_date,
                    'total_amount' => $net_amount,
                    'discount_amount' => $request->discount,
                    'tax_amount' => $request->tax,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);

                //insert po item with po id
                foreach($tmpgrn as $tgrn){
                    // dd($grn_id);
                    $grn_item = new GoodsReceiveNoteItem();
                    $grn_item->goods_receive_note_id = $grn_id;
                    $grn_item->product_id = $tgrn->product_id;
                    $grn_item->qty = $tgrn->qty;
                    $grn_item->free_qty = $tgrn->free_qty;
                    $grn_item->unit_price = $tgrn->unit_price;
                    $grn_item->sales_price = $tgrn->sales_price;
                    $grn_item->discount = $tgrn->dis_amt;
                    $grn_item->save();

                    $price = ProductPrice::where([
                            'product_id' => $tgrn->product_id,
                            'cost_price' => $tgrn->unit_price,
                            'sale_price' => $tgrn->sales_price
                        ])
                        ->get()
                        ->first();

                    if($price != null){
                        $price_id = $price->id;
                    }else{
                        $price_id = ProductPrice::insertGetId([
                            'product_id' => $tgrn->product_id,
                            'cost_price' => $tgrn->unit_price,
                            'ws_price' => $tgrn->sales_price,
                            'sale_price' => $tgrn->sales_price,
                            'grn_date' => $request->grn_date,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ]);
                    }

                    $stock = Stock::where([
                            'company_id' => Auth::user()->company_id,
                            'location_id' => $request->location_id,
                            'product_id' => $tgrn->product_id,
                            'price_id' => $price_id
                        ])
                        ->get()
                        ->first();

                    if($stock != null){
                        $stock->shelf_qty = $stock->shelf_qty + $tgrn->qty + $tgrn->free_qty;
                        $stock->update();
                    }else{
                        $stock = new Stock();
                        $stock->company_id = Auth::user()->company_id;
                        $stock->location_id = $request->location_id;
                        $stock->product_id = $tgrn->product_id;
                        $stock->price_id = $price_id;
                        $stock->shelf_qty = $tgrn->qty + $tgrn->free_qty;
                        $stock->monthly_open_qty = $tgrn->qty + $tgrn->free_qty;
                        $stock->save();
                    }
                }

                //empty item listSS
                $tmpgrn_del = tmpGRN::where('user_id', Auth::user()->id)->delete();

                return redirect()->back()->with([
                    'success'=> 'Goods Receive Note Saved',
                    'print-pdf' => $grn_id
                ]);
            }else{
                return redirect()->back()->with('error', 'Empty Item List');
            }

        }else if($request->has('cancel')){
            $tmpgrn_del = tmpGRN::where('user_id', Auth::user()->id)->delete();

            return redirect()->back();
        }else if($request->has('pdf')){
            $grn = GoodsReceiveNote::where('id', $request->id)
                ->get()
                ->first();
            // dd($grn);
            
            $data['grn'] = $grn;

            $pdf = PDF::loadView('reports.rpt_goods_receive_note',$data);

            return $pdf->stream();
            // return $pdf->download($po->code.'.pdf');
        }
    }

    public function pdf($id){
        $grn = GoodsReceiveNote::where('id', $id)
                ->get()
                ->first();

        $data['grn'] = $grn;

        $pdf = PDF::loadView('reports.rpt_goods_receive_note',$data);
        return $pdf->stream();
        // return $pdf->download($po->code.'.pdf');
    }
}
