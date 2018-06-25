<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Company;
use App\Category;

class ItemController extends Controller
{
    public function view(Request $request){
        $departments = Company::find(Auth::user()->company_id)->departments;
        $suppliers = Company::find(Auth::user()->company_id)->suppliers;
        $units = Company::find(Auth::user()->company_id)->units;
        
        if($request->ajax()){
            if($request !== null){
                $categories = DB::table('categories')->where('department_id', '=', $request->department_id)->get();
                return view('shared.modal.ajax.categories',compact('categories'));
            }
        }

        return view('home.master.items.item')
            ->with([
                'departments' => $departments,
                'suppliers' => $suppliers,
                'units' => $units
            ]);
    }

    public function insert(Request $request){
        dd($request);
    }
}
