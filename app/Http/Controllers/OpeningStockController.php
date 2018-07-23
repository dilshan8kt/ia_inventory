<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Company;

class OpeningStockController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','roles']);
    }
    
    public function view(){
        $data = Company::find(Auth::user()->company_id);
        return view('home.inventory.opening-stock')
            ->with(['data' => $data]);
    }
}
