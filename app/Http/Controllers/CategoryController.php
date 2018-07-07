<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Company;
use App\Category;
use App\Department;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','roles']);
    }

    public function view(){
        $categories = Company::find(Auth::user()->company_id)->category;
        $departments = Company::find(Auth::user()->company_id)->departments;
        return view('home.master.products.category')
            ->with([
                'categories' => $categories,
                'departments' => $departments
            ]);
    }

    public function insert(Request $request){
        $request->validate([
            'name' => 'required|max:25',
            'status' => 'required',
        ]);

        $cat =Category::withTrashed()
            ->where([
                'company_id' => Auth::user()->company_id,
                'department_id' => $request->department_id
            ])->get()->last();
        
        $dep = Department::where('id', $request->department_id)->first();
        $split_depcode = explode('-', $dep->code, 2);
        $depcode = ($split_depcode[1] * 1);
        
        if($cat != null){
            $split_catcode = explode('-', $cat->code, 2);
            $code = $split_catcode[1];
            // dd($code);
            $code = explode($depcode, $code, 2);

            $code = $code[1] + 1;
            
            if(strlen($code) === 1){
                $code =$depcode. '00'.$code;
            }elseif(strlen($code) === 2){
                $code = $depcode. '0'.$code;
            }else{
                $code = $depcode.''.$code;
            }
        }else{
            $code = $depcode.'001';
        }

        $category = new Category(); 
        $category->company_id = Auth::user()->company_id;
        $category->department_id = $request->input('department_id');
        $category->code =  'CAT-'.$code;
        $category->name =  $request->input('name');
        $category->description = $request->input('description');
        $category->status = $request->input('status');
        $category->save();
        
        return redirect()->back()->with('success', 'New Category Created!');
    }

    public function delete(Request $request){
        $category = Category::findOrFail($request->input('id'));
        $category->delete();

        return redirect()->back()->with('success', 'Category Deleted!');
    }

    public function edit(Request $request){
        $category = Category::findOrFail($request->input('id'));
        $category->department_id =  $request->input('department_id');
        $category->name =  $request->input('name');
        $category->description = $request->input('description');
        $category->status = $request->input('status');
        $category->update();
        
        return redirect()->back()->with('success', 'Department details updated!!');
    }
}
