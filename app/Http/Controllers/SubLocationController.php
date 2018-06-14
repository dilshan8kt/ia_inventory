<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Company;
use App\SubLocation;

class SubLocationController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','roles']);
    }

    public function getSubLocation(){
        $sublocations = Company::find(Auth::user()->company_id)->sublocation;
        return view('home.master.sub-location')->with('sublocations', $sublocations);
    }

    public function postSubLocation(Request $request){
        $request->validate([
            'location_name' => 'required|unique:sub_locations|max:25',
            'status' => 'required',
        ]);
            
        $sublocation = new SubLocation();
        $sublocation->company_id = Auth::user()->company_id;
        $sublocation->Location_name = $request->input('location_name');
        $sublocation->description = $request->input('description');
        $sublocation->telephone_no = $request->input('telephone_no');
        $sublocation->address = $request->input('address');
        $sublocation->status = $request->input('status');
        $sublocation->save();

        return redirect()->back()->with('success', 'New Sub Location added successfully!!');
    }
}
