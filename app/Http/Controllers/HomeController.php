<?php

namespace App\Http\Controllers;

use App\Models\TCommune;
use App\Models\TypeDocument;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

        // User::create([
        //     'telephone' => 'srtephane',
        //     'email' => "kgsdev8@gmail.com",
        //     'password' => Hash::make(12345),
        // ]);



        $listetypesdocument  = TypeDocument::all();
        $communes  = TCommune::all();





        return view('home', [
            'typedocument' => $listetypesdocument,
            'communes' => $communes
        ]);
    }
}
