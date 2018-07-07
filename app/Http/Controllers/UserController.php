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
        $file = Storage::disk('local')->get('users/'.$filename);
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

    public function edit(Request $request){
        $user = User::findOrFail(Auth::user()->id);
        $user->first_name =  $request->input('first_name');
        $user->middle_name =  $request->input('middle_name');
        $user->last_name =  $request->input('last_name');
        $user->telephone_no = $request->input('telephone_no');
        $user->status = $request->input('status');
        $user->update();

        //store user image to laravel storage
        $file = $request->file('image');        
        $filename = Auth::user()->id . '-' . $request['first_name'] . '.jpg';

        if($file){
            Storage::disk('local')->put('users/'.$filename, File::get($file));
        }
        
        return redirect()->back()->with('success', 'Profile Updated!!');
    }

    public function insert(Request $request){
        dd($request);
    }
}
