<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CandidatureController extends Controller
{
     public function create() {
        return view('candidatures.create');
     }

     
     public function index() {
        return view('candidatures.liste');
     }
}
