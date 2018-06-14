<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\SupplierCategory;

class SupplierCategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function getSupplierCategory(){
        $supplier_category = SupplierCategory::where('company_id', Auth::user()->company_id)->get();
        return view('home.supplier.category')->with('supplier_category',$supplier_category);
    }

    public function postSupplierCategory(Request $request){

        $request->validate([
            'name' => 'required|unique:supplier_categories|max:25',
            'description' => 'required',
            'status' => 'required',
        ]);

        $supplier_category = new SupplierCategory();
        $supplier_category->company_id = Auth::user()->company_id;
        $supplier_category->name = $request->input('name');
        $supplier_category->description = $request->input('description');
        $supplier_category->status = $request->input('status');
        $supplier_category->save();

        return redirect()->back()->with('success', 'Category Added Successfully!!');
    }
}
