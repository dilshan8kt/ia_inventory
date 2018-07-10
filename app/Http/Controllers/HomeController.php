<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Company;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','roles']);
    }

    public function view(){
        $product = Company::find(Auth::user()->company_id)->products->count();
        return view('home.dashboard')
            ->with([
                'product_count' => $product
            ]);
    }
}
