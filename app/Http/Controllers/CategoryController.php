<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Company;
use App\Category;

class CategoryController extends Controller
{
    public function view(){
        $categories = Company::find(Auth::user()->company_id)->category;
        $departments = Company::find(Auth::user()->company_id)->departments;
        return view('home.master.items.category')
            ->with([
                'categories' => $categories,
                'departments' => $departments
            ]);
    }

    public function insert(Request $request){
        $request->validate([
            'name' => 'required|unique:categories|max:25',
            'status' => 'required',
        ]);

        $category = new Category(); 
        $category->department_id = $request->input('department_id');
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
