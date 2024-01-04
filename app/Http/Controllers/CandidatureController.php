<?php

namespace App\Http\Controllers;

use App\Models\Candidature;


class CandidatureController extends Controller
{
     public function create() {
        return view('candidatures.create');
     }


     public function index() {
        return view('candidatures.liste');
     }

     public function show(string $id) {
        return view('candidatures.detail', [
            'detailCandidature'=> Candidature::find($id)
        ]);
     }
}
