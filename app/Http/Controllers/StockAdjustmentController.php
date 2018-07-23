<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockAdjustmentController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','roles']);
    }

    public function view(){
        return view('home.inventory.san.stock-adjustment');
    }
}
