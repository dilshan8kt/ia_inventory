<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Company;
use App\Department;

class DepartmentController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','roles']);
    }
    
    public function view(){
        $departments = Company::find(Auth::user()->company_id)->departments;
        return view('home.master.items.department')
            ->with('departments', $departments);
    }

    public function insert(Request $request){
        $request->validate([
            'name' => 'required|unique:departments|max:25',
            'status' => 'required',
        ]);

        $department = new Department();
        $department->company_id = Auth::user()->company_id;
        $department->name =  $request->input('name');
        $department->description = $request->input('description');
        $department->status = $request->input('status');
        $department->save();
        
        return redirect()->back()->with('success', 'New Department Created!');
    }

    public function delete(Request $request){
        $department = Department::findOrFail($request->input('id'));
        $department->delete();

        return redirect()->back()->with('success', 'Department Deleted!');
    }

    public function edit(Request $request){
        $department = Department::findOrFail($request->input('id'));
        $department->name =  $request->input('name');
        $department->description = $request->input('description');
        $department->status = $request->input('status');
        $department->update();
        
        return redirect()->back()->with('success', 'Department details updated!!');
    }
}
