<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Company;
use App\Role;
use App\User;
use App\Setting;

class AuthController extends Controller
{
    public function signin(Request $request){
        $data=$request->only('username','password');
        if(Auth::attempt($data)){
            $user = User::find(Auth::user()->id);
            $company = Company::find(Auth::user()->company_id);
            $setting = Setting::where('company_id',Auth::user()->company_id)->first();

            // dd($setting);

            if(Auth::user()->company_id == 1){
                return redirect()->route('site.dashboard')->with('loggedin','Welcome back');
            }

            if($company->status == 1){
                if($user->status){
                    if(Auth::user()->role(Auth::user()->id) == "Super Admin" || Auth::user()->role(Auth::user()->id) == "Admin"){
                        if($setting == null){
                            return redirect()->route('company-settings')->with('loggedin','Welcome back');
                        }
                    }
                    return redirect()->route('dashboard')->with('loggedin','Welcome back');
                }
                return redirect()->back()->with('error','Login Error, Account Deactivated.');
            }else{
                return redirect()->back()->with('error','Login Error, Company Profile Deactivated.');
            }
        }
        return redirect()->back()->with('error','Invalid Credentials')->withInput();
    }

    public function signout(){
        Auth::Logout();
        session::flush();
        return redirect('login')->with('logout', 'Successfully Logout');
    }
}
