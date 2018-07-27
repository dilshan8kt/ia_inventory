<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Company;
use App\Product;
use App\ProductPrice;
use App\PurchaseOrder;
use App\PurchaseOrderItems;
use App\tmpPO;
use Carbon\Carbon;
use PDF;

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

            if($request->ajax()){
                return view('shared.ajax.podetails')
                    ->with([
                        'tmppo' => $tmppo
                    ]);
            }

            return redirect()->back()
                ->with([
                    'tmppo' => $tmppo
                ]);
        
    }

    public function create(Request $request){
        $net_amount = 0;

        //po code begin
        $carbon = Carbon::now();
        $po = Company::find(Auth::user()->company_id)->purchaseorders->last();

        $split_year = substr($carbon->year, 2);
        
        if($po != null){
            $split_code = explode("-",$po->code, 3);

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

            $code ="PO-". $split_year ."-". $code;
        }else{
            $code ="PO-". $split_year ."-001";
        }
        //po code end
        
        
        if($request->has('save')){
            $tmppo = tmpPO::where('user_id', Auth::user()->id)->get();

            if($tmppo->count() > 0){
                foreach($tmppo as $tpo){
                    $net_amount += ($tpo->unit_price * $tpo->quantity);
                }

                //insert po and get id
                $po_id = PurchaseOrder::insertGetId([
                    'company_id' => Auth::user()->company_id,
                    'supplier_id' => $request->supplier_id,
                    'location_id' => 1,
                    'code' => $code,
                    'net_amount' => $net_amount,
                    'remarks' => 'a',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);

                //insert po item with po id
                foreach($tmppo as $tpo){
                    $po_item = new PurchaseOrderItems();
                    $po_item->purchase_order_id = $po_id;
                    $po_item->product_id = $tpo->product_id;
                    $po_item->quantity = $tpo->quantity;
                    $po_item->unit_price = $tpo->unit_price;
                    $po_item->save();
                }

                //empty item listSS
                $tmppo_del = tmpPO::where('user_id', Auth::user()->id)->delete();

                return redirect()->back()->with([
                    'success'=> 'Purchase Order Saved',
                    'print-pdf' => $po_id
                ]);
            }else{
                return redirect()->back()->with('error', 'Empty Item List');
            }
        }else if($request->has('cancel')){
            $tmppo_del = tmpPO::where('user_id', Auth::user()->id)->delete();

            return redirect()->back();
        }else if($request->has('pdf')){
            $po = PurchaseOrder::where('id', $request->id)
                ->get()
                ->first();

            $data['po'] = $po;

            $pdf = PDF::loadView('reports.rpt_purchase_order',$data);

            // $pdf->output();
            // $dom_pdf = $pdf->getDomPDF();

            // $canvas = $dom_pdf->get_canvas();
            // $canvas->page_text(0,0,"Page{PAGE_NUM} of {PAGE_COUNT}",null,10,array(0,0,0));

            return $pdf->stream();
            // return $pdf->download($po->code.'.pdf');
        }

        return redirect()->back()->with([
            'error'=> 'Oops something went wrong!!'
        ]);
    }

    public function tmpRemove(Request $request){
        if($request->ajax()){
            $del_tmp = tmpPO::where('id', $request->id)->get()->first();
            $del_tmp->delete();

            $tmppo = tmpPO::where('user_id', Auth::user()->id)->get();

            return view('shared.ajax.podetails')
                    ->with([
                        'tmppo' => $tmppo
                    ]);
        }
    }

    public function getPO(){
        $po = Company::find(Auth::user()->company_id)->purchaseorders;

        return view('home.inventory.po.view-purchase-order')
            ->with(['po' => $po]);
    }

    public function pdf($id){
        $po = PurchaseOrder::where('id', $id)
                ->get()
                ->first();

        $data['po'] = $po;

        $pdf = PDF::loadView('reports.rpt_purchase_order',$data);
        return $pdf->stream();
        // return $pdf->download($po->code.'.pdf');
    }
}
