<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','roles']);
    }

    public function getUserImage($filename){
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }

    public function profile(){
        return view('user-profile.profile');
    }

    public function changePassword(Request $request)
    {  
        $current_password = Auth::User()->password;           
        if(Hash::check($request->current_password, $current_password))
        {        
            $user = User::find(Auth::User()->id);
            $user->password = Hash::make($request->new_password);;
            $user->save(); 
            return redirect()
                ->back()
                ->with('success', 'Password Change Successfully!!');
        }
        else
        {            
            return redirect()
                 ->back()
                 ->with('error', 'Current Password does not match');
        }
    }
}
