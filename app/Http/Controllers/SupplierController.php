<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function getSupplier(){
        return view('home.supplier.supplier');
    }
}
