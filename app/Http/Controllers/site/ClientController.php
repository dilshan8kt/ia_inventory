<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use App\Package;
use App\User;
use App\Role;
use Carbon\Carbon;

class ClientController extends Controller
{
    public function view(){
        $clients = Company::where('id', '<>', 1)->get();
        $package = Package::all();
        return view('site_administration.home.clients.clients')
            ->with([
                'clients' => $clients,
                'package' => $package
            ]);
    }

    public function create(Request $request){
        $client_id = Company::insertGetId([
            'company_name' => $request->company_name,
            'address_line1' => $request->address_line_1,
            'address_line2' => $request->address_line_2,
            'address_line3' => $request->address_line_3,
            'telephone_no' => $request->telephone_no,
            'email' => $request->email,
            'status' => $request->status,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $user = new User();
        $user->company_id = $client_id;
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->last_name = $request->last_name;
        $user->telephone_no = $request->telephone_no;
        $user->username = $request->email;
        $user->password = bcrypt('12345');
        $user->status = $request->status;
        $user->save();

        $user_role = Role::where('id', 1)->first();
        $user->roles()->attach($user_role);

        return redirect()->back()->with(['success' => 'Client Registerd!']);
    }
}
