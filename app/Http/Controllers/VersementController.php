<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VersementController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     */
    public function __invoke()
    {
        return view('versement.liste');
    }

}
