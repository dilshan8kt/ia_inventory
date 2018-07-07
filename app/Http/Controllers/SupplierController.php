<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Company;
use App\Supplier;

class SupplierController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','roles']);
    }

    public function view(){
        $suppliers = Company::find(Auth::user()->id)->suppliers;
        return view('home.master.supplier')->with('suppliers', $suppliers);
    }

    public function insert(Request $request){
        $request->validate([
            'status' => 'required',
        ]);
        
        $sup = Supplier::withTrashed()->where('company_id', Auth::user()->company_id)->get()->last();

        if($sup != null){
            $split_supcode = explode('-', $sup->code, 2);
            $code = $split_supcode[1];
            $code = $code + 1;
            if(strlen($code) === 1){
                $code = '0'.$code;
            }
        }else{
            $code = '01';
        }

        $supplier = new Supplier();
        $supplier->company_id = Auth::user()->company_id;
        $supplier->code = 'SUP-' . $code ;
        $supplier->ref_name =  $request->input('ref_name');
        $supplier->company_name = $request->input('company_name');
        $supplier->address = $request->input('address');
        $supplier->phone1 = $request->input('phone1');
        $supplier->phone2 = $request->input('phone2');
        $supplier->email = $request->input('email');
        $supplier->status = $request->input('status');
        $supplier->save();
        
        return redirect()->back()->with('success', 'New Supplier Created!');
    }

    public function delete(Request $request){
        $supplier = Supplier::findOrFail($request->input('id'));
        $supplier->delete();

        return redirect()->back()->with('success', 'Supplier Deleted!');
    }

    public function edit(Request $request){
        $supplier = Supplier::findOrFail($request->input('id'));
        $supplier->ref_name =  $request->input('eref_name');
        $supplier->company_name = $request->input('ecompany_name');
        $supplier->address = $request->input('eaddress');
        $supplier->phone1 = $request->input('ephone1');
        $supplier->phone2 = $request->input('ephone2');
        $supplier->email = $request->input('eemail');
        $supplier->status = $request->input('status');
        $supplier->update();
        
        return redirect()->back()->with('success', 'Suppiler details updated!!');
    }
}
