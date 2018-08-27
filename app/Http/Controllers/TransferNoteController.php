<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransferNoteController extends Controller
{
    public function view(){
        return view('home.inventory.tn.transfer-note');
    }
}
