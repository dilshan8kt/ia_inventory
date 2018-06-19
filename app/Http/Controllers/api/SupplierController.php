<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Company;
use App\Supplier;
use App\User;
use JWTAuth;

class SupplierController extends Controller
{
    // public function __construct(){
    //     $user = JWTAuth::parseToken()->toUser()->id;
    //     $company = User::find($user)->company->id;
    //     dd($company);
    // }
    
    //get all supplier details
    public function apiGet(){
        $suppliers = Company::find(User::find(JWTAuth::parseToken()->toUser()->id)->company->id)->suppliers;
        return response()->json($suppliers, 200);
    }
	
	public function apiPost(Request $request){
        $sup = DB::table('suppliers')->where('company_id', 1)->orderBy('id', 'desc')->first();

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
        $supplier->company_id = 1;
        $supplier->code = 'SUP-' . $code ;
        $supplier->ref_name =  $request->input('ref_name');
        $supplier->company_name = $request->input('company_name');
        $supplier->address = $request->input('address');
        $supplier->phone1 = $request->input('phone1');
        $supplier->phone2 = $request->input('phone2');
        $supplier->email = $request->input('email');
        $supplier->status = $request->input('status');
        $supplier->save();
        
        return response()->json(['success'=> 'New Supplier Created!',200]);
    }
}
