<?php

namespace App\Http\Controllers;

use App\Models\Candidature;
use App\Models\Compte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function allCandidaures() {
            return view('admin.candidatures.listecandidature', [
                'allCandidatures' => Candidature::paginate(20)
            ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'countRevenues'=> Compte::where('user_id', Auth::user()->id)->sum('solde')
        ]);
    }
}
