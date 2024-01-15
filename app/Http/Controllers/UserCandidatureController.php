<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Compte;
use App\Models\Versement;
use App\Models\Candidature;
use App\Models\UserActivite;
use Illuminate\Http\Request;

class UserCandidatureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index(User $user) {
        return view('candidatures.USERS.liste', [
            'user'=> $user,
            'countCandidature'=> Candidature::where('user_id', $user->id)->count(),
            'allCandidaturesByuSers'=> Candidature::where('user_id', $user->id)->get(),
            'etatFiancier'=>  Compte::where('user_id', $user->id)->sum('solde'),
            'activites' =>  UserActivite::where('user_id', $user->id)->get()
        ]);
    }
}
