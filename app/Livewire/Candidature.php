<?php

namespace App\Livewire;

use App\Models\Compte;
use Livewire\Component;
use App\Models\Validation;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Models\Candidature as ModelsCandidature;


class Candidature extends Component
{


    use WithFileUploads;

    public  $nom, $prenom, $candidatureId, $email, $photo, $matricule,$ville_composition,
    $identifiant_permanent, $telephone, $serie, $centre_composition,
     $numero_bts, $mention, $point_bac, $ecole_origine, $sexe,
     $numero_table, $anne_academec_id, $mode, $editMode, $search;

        protected $rules = [
        'nom' => 'required',
        'prenom' => 'required' ,
        'email'=> 'required',
        'photo'=> 'required',
        'matricule'=> 'required',
        'identifiant_permanent'=> 'required',
        'telephone'=> 'required',
        'serie'=> 'required',
        'centre_composition'=> 'required',
        'ville_composition'=> 'required',
        'numero_bts'=> 'required',
        'mention'=> 'required',
        'point_bac'=> 'required',
        'ecole_origine'=> 'required',
        'sexe' => 'required',
        'numero_table' => 'required',
        ];

        protected $queryString = ['search'];

        public function displayFormCandidature() {
            $this->mode = true ;

        }


        public function cancelCandidaure()   {
            $this->mode = false ;
            $this->reset();
        }

        public function createCandidature() {
            $this->editMode = true ;
            $photo =   $this->photo->store('public/etudiant/photos');
            ModelsCandidature::create([
                'nom' => $this->nom,
                'prenom' => $this->prenom,
                'email' => $this->email,
                'matricule' => $this->matricule,
                'identifiant_permanent' => $this->identifiant_permanent,
                'telephone' => $this->telephone,
                'serie' => $this->serie,
                'centre_composition' => $this->centre_composition,
                'ville_composition' => $this->ville_composition,
                'numero_bts' => $this->numero_bts,
                'mention' => $this->mention,
                'point_bac' => $this->point_bac,
                'ecole_origine' => $this->ecole_origine,
                'sexe' => $this->sexe,
                'photo' => $photo,
                'user_id'=> Auth::user()->id
            ]);

            $this->mode= false ;

            Compte::create([
                'solde'=> 1000,
                'user_id'=> Auth::user()->id
            ]);

            $this->reset();
        }


        public function valider($id) {
           $candidature =  ModelsCandidature::find($id);

            Validation::create([
                'code_candidature'=> rand(100, 200),
                'etat'=> 'valide',
                'justificatif'=> 'candidature validée',
                'qrcode'=> 'generate',
                'candidature_id'=> $candidature->id
            ]);
            return redirect()->back();
        }

    public function render()
    {
        return view('livewire.candidature', [
            'allCandidatures' => ModelsCandidature::
                                                 where('nom', 'like', '%'.$this->search.'%')->where('user_id', Auth::user()->id)->paginate(20),
        ]);
    }
}
