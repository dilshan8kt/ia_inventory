<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IssueNoteController extends Controller
{
    public function view(){
        return view('home.inventory.in.issue-note');
    }
}
