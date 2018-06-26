<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Company;
use App\Category;
use App\Department;
use App\Item;
use App\ReOrder;

class ItemController extends Controller
{
    public function view(Request $request){
        $departments = Company::find(Auth::user()->company_id)->departments;
        $suppliers = Company::find(Auth::user()->company_id)->suppliers;
        $units = Company::find(Auth::user()->company_id)->units;
        $items = Company::find(Auth::user()->company_id)->items;
        
        if($request->ajax()){
            if($request !== null){
                $categories = DB::table('categories')->where('department_id', '=', $request->department_id)->get();
                return view('shared.modal.ajax.categories')
                    ->with('categories', $categories);
            }
        }

        return view('home.master.items.item')
            ->with([
                'departments' => $departments,
                'suppliers' => $suppliers,
                'units' => $units,
                'items' => $items
            ]);
    }

    public function insert(Request $request){
        $itm = Item::withTrashed()
            ->where([
                'company_id' => Auth::user()->company_id,
                'category_id' => $request->category_id
            ])
            ->get()
            ->last();


        // dd($itm);
        $cat = Category::where('id', $request->category_id)->get()->first();

        //get category code
        $split_catcode = explode('-', $cat->code, 2);
        $cat_code = $split_catcode[1];

        if($itm != null){
            $split_itmcode = explode($cat_code, $itm->code, 2);
            $code = $split_itmcode[1];
            // dd($code);
            $code = $code + 1;
            $code = $cat_code.''.$code;
        }else{
            $code = $cat_code.'1';
        }

        $item = new Item();
        $item->company_id = Auth::user()->company_id;
        $item->department_id = $request->department_id;
        $item->category_id = $request->category_id;
        $item->supplier_id = $request->supplier_id;
        $item->code = $code;
        $item->barcode_1 = $request->barcode_1;
        $item->barcode_2 = $request->barcode_2;
        $item->name_eng = $request->name_eng;
        $item->name_sin = $request->name_sin;
        $item->unit = $request->unit_name;
        $item->status = $request->status;
        $item->save();
        
        if($request->re_order != null){
            $item_id = Item::where('code', $code)->first();
            $reorder = new ReOrder();
            $reorder->item_id = $item_id->id;
            $reorder->level = $request->re_order_level;
            $reorder->quantity = $request->re_order_quantity;
            $reorder->max = $request->re_order_max;
            $reorder->save();
        }
        return redirect()->back()->with('success', 'New Item Created!');
    }
}
