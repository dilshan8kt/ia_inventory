<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function getSupplierCategoryForm(){
        return view('home.supplier.category');
    }
}
