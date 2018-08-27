<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Company;
use App\Role;

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
        return view('home.users.profile');
    }

    public function changePassword(Request $request){  
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

    public function view(){
        // $users = Company::find(Auth::user()->company_id)->users;
        
        $users = User::where('company_id', Auth::user()->company_id)
            ->where('id', '<>', Auth::user()->id)
            ->get();
        
        if(Auth::user()->role(Auth::user()->id) == 'Super Admin'){
            $roles = Role::all();   
        }else{
            $roles = Role::where('id', '<>', 1)->get();            
        }
        
        return view('home.users.users')
            ->with([
                'users' => $users, 
                'roles' => $roles
            ]);
    }

    public function edit(Request $request){
        if($request->id){
            $user = User::findOrFail($request->id);
            $user->telephone_no = $request->input('phone_edit');
        }else{
            $user = User::findOrFail(Auth::user()->id);
            $user->username = $request->input('username');
            $user->telephone_no = $request->input('telephone_no');
        }
        $user->first_name =  $request->input('first_name');
        $user->middle_name =  $request->input('middle_name');
        $user->last_name =  $request->input('last_name');
        if($request->id){
            $user->status = $request->input('status');
            $user->roles()->detach();
            $user_role = Role::where('id', $request->role)->first();
            $user->roles()->attach($user_role);

        }
        $user->update();

        if(!$request->id){
            //store user image to laravel storage
            $file = $request->file('image');        
            $filename = Auth::user()->id . '-' . $request['first_name'] . '.jpg';
            
            if($file){
                Storage::disk('local')->put('users/'.$filename, File::get($file));
            }
        }
        
        return redirect()->back()->with('success', 'Profile Updated!!');
    }

    public function create(Request $request){
        $user = new User();
        $user->company_id = Auth::user()->company_id;
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->last_name = $request->last_name;
        $user->telephone_no = $request->phone;
        $user->username = $request->username;
        $user->password = bcrypt('12345');
        $user->status = $request->status;
        $user->save();

        $user_role = Role::where('id', $request->role)->first();
        $user->roles()->attach($user_role);

        return back()->with('success', 'New User Created!!');
    }

    public function delete(Request $request){
        $user = User::findOrFail($request->input('id'));
        $user->delete();

        return redirect()->back()->with('success', 'User Deleted!');
    }
}
