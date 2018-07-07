<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Company;
use App\Category;
use App\Department;
use App\Product;
use App\ReOrder;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','roles']);
    }
 
    public function view(Request $request){
        $departments = Company::find(Auth::user()->company_id)->departments;
        $categories = Company::find(Auth::user()->company_id)->categories;
        $suppliers = Company::find(Auth::user()->company_id)->suppliers;
        $units = Company::find(Auth::user()->company_id)->units;
        $products = Company::find(Auth::user()->company_id)->products;
        
        // dd($reorder);
        if($request->ajax()){
            if($request !== null){
                if($request->product_id != null){
                    $reorder = DB::table('re_orders')->where('product_id', '=', $request->product_id)->get();
                    if($reorder != null){
                        // return view('shared.modal.item.re-order')
                        //     ->with([
                        //         'reorder' => $reorder    
                        //     ]);
                        return new Response($reorder, 200);
                    }
                }
                $categories = DB::table('categories')->where('department_id', '=', $request->department_id)->get();
                return view('shared.modal.ajax.categories')
                    ->with([
                        'categories' => $categories  
                    ]);
            }
        }

        return view('home.master.products.product')
            ->with([
                'departments' => $departments,
                'categories' => $categories,
                'suppliers' => $suppliers,
                'units' => $units,
                'products' => $products
            ]);
    }

    public function insert(Request $request){
        $pro = Product::withTrashed()
            ->where([
                'company_id' => Auth::user()->company_id,
                'category_id' => $request->category_id
            ])
            ->get()
            ->last();


        // dd($pro);
        $cat = Category::where('id', $request->category_id)->get()->first();

        //get category code
        $split_catcode = explode('-', $cat->code, 2);
        $cat_code = $split_catcode[1];

        if($pro != null){
            $split_procode = explode($cat_code, $pro->code, 2);
            $code = $split_procode[1];
            // dd($code);
            $code = $code + 1;
            $code = $cat_code.''.$code;
        }else{
            $code = $cat_code.'1';
        }

        if($request->re_order != null){
            $reorder = 1;
        }else{
            $reorder = 0;
        }

        $product = new Product();
        $product->company_id = Auth::user()->company_id;
        $product->department_id = $request->department_id;
        $product->category_id = $request->category_id;
        $product->supplier_id = $request->supplier_id;
        $product->code = $code;
        $product->barcode_1 = $request->barcode_1;
        $product->barcode_2 = $request->barcode_2;
        $product->name_eng = $request->name_eng;
        $product->name_sin = $request->name_sin;
        $product->unit = $request->unit_name;
        $product->reorder = $reorder;
        $product->status = $request->status;
        $product->save();
        
        if($request->re_order != null){
            $product_id = Product::where('code', $code)->first();
            $reorder = new ReOrder();
            $reorder->product_id = $product_id->id;
            $reorder->level = $request->re_order_level;
            $reorder->quantity = $request->re_order_quantity;
            $reorder->max = $request->re_order_max;
            $reorder->save();
        }
        return redirect()->back()->with('success', 'New Item Created!');
    }

    public function delete(Request $request){
        $product = Product::findOrFail($request->input('id'));
        $product->delete();

        return redirect()->back()->with('success', 'Item Deleted!');
    }

    public function edit(Request $request){
        $product = Product::where('id', $request->product_id)->get()->first();

        if($request->re_order_edit != null){
            $reorder = 1;
        }else{
            $reorder = 0;
        }

        // dd($request);

        if($request->category_id_edit != $product->category_id){
            $pro = Product::withTrashed()
                ->where([
                    'company_id' => Auth::user()->company_id,
                    'category_id' => $request->category_id_edit
                ])
                ->get()
                ->last();

            $cat = Category::where('id', $request->category_id_edit)->get()->first();

            //get category code
            $split_catcode = explode('-', $cat->code, 2);
            $cat_code = $split_catcode[1];

            if($pro != null){
                $split_procode = explode($cat_code, $pro->code, 2);
                $code = $split_procode[1];
                $code = $code + 1;
                $code = $cat_code.''.$code;
            }else{
                $code = $cat_code.'1';
            } 
        }else{
            $code = $request->code;
        }

        $product->department_id = $request->department_id_edit;
        $product->category_id = $request->category_id_edit;
        $product->supplier_id = $request->supplier_id;
        $product->code = $code;
        $product->barcode_1 = $request->barcode_1;
        $product->barcode_2 = $request->barcode_2;
        $product->name_eng = $request->name_eng;
        $product->name_sin = $request->name_sin;
        $product->unit = $request->unit_name;
        $product->reorder = $reorder;
        $product->status = $request->status;
        $product->update();

        if($reorder){
            $reorder = ReOrder::withTrashed()->where('product_id', $request->product_id)->get()->first();
            // dd($request);
            if($reorder != null){
                $reorder->level = $request->re_order_level;
                $reorder->quantity = $request->re_order_quantity;
                $reorder->max = $request->re_order_max;
                $reorder->update();
                $reorder->restore();
            }else{
                $reorder = new ReOrder();
                $reorder->product_id = $request->product_id;
                $reorder->level = $request->re_order_level;
                $reorder->quantity = $request->re_order_quantity;
                $reorder->max = $request->re_order_max;
                $reorder->save();
            }
        }else{
            $reorder = ReOrder::where('product_id', $request->product_id)->get()->first();
            $reorder->delete();
        }

        return redirect()->back()->with('success', 'Product Details Updated!');
    }
    
}
