<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Company;
use App\SubLocation;

class SubLocationController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','roles']);
    }

    public function view(){
        $sublocations = Company::find(Auth::user()->company_id)->sublocations;
        return view('home.master.sub-location')->with('sublocations', $sublocations);
    }

    public function insert(Request $request){
        $request->validate([
            'location_name' => 'required|unique:sub_locations|max:25',
            'status' => 'required',
        ]);

        $company = Company::find(Auth::user()->company_id);
            
        $sublocation = new SubLocation();
        $sublocation->company_id = Auth::user()->company_id;
        $sublocation->Location_name = $request->input('location_name');
        $sublocation->description = $request->input('description');
        $sublocation->telephone_no = $request->input('telephone_no');

        if($request->addresschecked){
            $sublocation->address = $company->address_line1 . '\r\n' . $company->address_line2 . '\r\n' .$company->address_line3;
        }else{
            $sublocation->address = $request->input('address');
        }
        $sublocation->status = $request->input('status');
        $sublocation->save();

        return redirect()->back()->with('success', 'New Sub Location added successfully!!');
    }

    public function update(Request $request){
        $sublocation = SubLocation::findOrFail($request->input('id'));

        if($request->input('location_name') !== $sublocation->location_name){
            $sl_name = DB::table('sub_locations')->where('location_name', $request->input('location_name'))->first();
            if($sl_name === null){
                $sublocation->Location_name = $request->input('location_name');
            }else{
                return redirect()->back()->with('error', 'Location Name Allready Exists!');
            }
        }
        
        $sublocation->description = $request->input('description');
        $sublocation->telephone_no = $request->input('telephone_no');

        if($request->addresschecked){
            $sublocation->address = $company->address_line1 . ', ' . $company->address_line2 . ', ' .$company->address_line3;
        }else{
            $sublocation->address = $request->input('address');
        }
        $sublocation->status = $request->input('status');
        $sublocation->update();

        return redirect()->back()->with('success', 'Location details updated!');
    }

    public function delete(Request $request){
        $sublocation = SubLocation::findOrFail($request->input('id'));
        $sublocation->delete();

        return redirect()->back()->with('success', 'Sub Location Deleted!');
    }
}
