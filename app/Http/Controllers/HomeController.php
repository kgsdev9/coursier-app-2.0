<?php

namespace App\Http\Controllers;

use App\Models\TCommune;
use App\Models\TypeDocument;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $listetypesdocument  = TypeDocument::all();
        $communes  = TCommune::all();


        return view('home', [
            'typedocument' => $listetypesdocument,
            'communes' => $communes
        ]);
    }
}
