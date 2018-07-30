<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function view(){
        $clients = Company::where('id', '<>', 1)->get();
        return view('site_administration.home.dashboard')
            ->with([
                'clients' => $clients
            ]);
    }
}
