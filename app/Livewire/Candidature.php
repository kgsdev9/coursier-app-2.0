<?php

namespace App\Livewire;

use App\Models\Compte;
use App\Models\Filiere;
use Livewire\Component;
use App\Models\Validation;
use App\Models\Nationnalite;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\TypeCandidature;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Candidature as ModelsCandidature;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class Candidature extends Component
{

    use WithFileUploads;
    use WithPagination;
    use LivewireAlert;

    protected $paginationTheme = 'bootstrap';

    public  $nom, $prenom, $candidatureId, $email, $photo, $matricule,$ville_composition,
    $identifiant_permanent, $telephone, $serie, $centre_composition, $status,
     $numero_bts, $point_bac, $ecole_origine, $sexe,$nationalite_id, $contact,
     $numero_table, $anne_academec_id, $mode, $editMode, $search, $oldImage, $typecandidature_id,$filiere_id, $date_naissance, $lieu_naissance;

        protected $rules = [
        'nom' => 'required',
        'prenom' => 'required' ,
        'email'=> 'required ',
        'photo'=>  'nullable',
        'point_bac'=>  'required',
        'contact'=>  'required',
        'matricule'=> 'required',
        'identifiant_permanent'=> 'nullable',
        'date_naissance'=> 'required',
        'lieu_naissance'=> 'required',
        'telephone'=> 'required',
        'serie'=> 'required',
        'centre_composition'=> 'required',
        'ville_composition'=> 'required',
        'numero_bts'=> 'nullable',
        'ecole_origine'=> 'required',
        'sexe' => 'required',
        'nationalite_id'=> 'required',
        'numero_table' => 'nullable',
        'filiere_id' => 'required',
        'typecandidature_id' => 'required',
        'status' => 'nullable',
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


            $image = md5($this->photo . microtime()).'.'.$this->photo->extension();
            $this->photo->storeAs('candidatures', $image);
            ModelsCandidature::create([
                'nom' => $this->nom,
                'prenom' => $this->prenom,
                'email' => $this->email,
                'point_bac' => $this->point_bac ?? 230,
                'contact' => $this->contact,
                'matricule' => $this->matricule,
                'typecandidature_id' => $this->typecandidature_id,
                'date_naissance' => $this->date_naissance,
                'lieu_naissance' => $this->lieu_naissance,
                'identifiant_permanent' => $this->identifiant_permanent ?? rand(1000, 200),
                'telephone' => $this->telephone,
                'status' => $this->status,
                'serie' => $this->serie,
                'centre_composition' => $this->centre_composition,
                'filiere_id' => $this->filiere_id,
                'ville_composition' => $this->ville_composition,
                'numero_bts' => $this->numero_bts ?? rand(1000, 2300),
                'ecole_origine' => $this->ecole_origine,
                'numero_table' => $this->numero_table,
                'sexe' => $this->sexe,
                'nationalite_id' => $this->nationalite_id,
                'photo' => $image,
                'user_id' => Auth::user()->id,
            ]);
            $this->mode= false ;
            Compte::create([
                'solde'=> 1000,
                'user_id'=> Auth::user()->id
            ]);
            $this->alert('success', 'Candidature ajoutée avec success');
            $this->reset();
        }

        public function delete() {
            dd('post supprimé');
        }

        public function cancel() {
            $this->mode = false ;
            $this->reset();

        }

        public function edit($id){

            try {
                $candidature = ModelsCandidature::findOrFail($id);
                if( !$candidature) {
                    session()->flash('error','Aucune candidature trouvée');
                } else {


                    $this->nom = $candidature->nom;
                    $this->nationalite_id = $candidature->nationalite_id;
                    $this->typecandidature_id = $candidature->typecandidature_id;
                    $this->filiere_id = $candidature->filiere_id;
                    $this->contact = $candidature->contact;
                    $this->date_naissance = $candidature->date_naissance;
                    $this->lieu_naissance = $candidature->lieu_naissance;
                    $this->prenom = $candidature->prenom;
                    $this->email = $candidature->email;
                    $this->matricule = $candidature->matricule;
                    $this->identifiant_permanent = $candidature->identifiant_permanent;
                    $this->telephone = $candidature->telephone;
                    $this->serie = $candidature->serie;
                    $this->centre_composition = $candidature->centre_composition;
                    $this->ville_composition = $candidature->ville_composition;
                    $this->numero_bts = $candidature->numero_bts;
                    $this->numero_table = $candidature->numero_table;
                    $this->point_bac = $candidature->point_bac;
                    $this->ecole_origine = $candidature->ecole_origine;
                    $this->sexe = $candidature->sexe;
                    $this->oldImage = $candidature->photo;
                    $this->candidatureId = $candidature->id;
                }
                $this->mode = true ;
            } catch (\Exception $ex) {
                session()->flash('error','Quelque chose va pas bine oups!!');
            }

        }

        public function update()
        {
            $this->validate();
            $candidature = ModelsCandidature::findOrFail($this->candidatureId);
            $photo = $candidature->photo;
            if($this->photo)
            {
                Storage::delete($candidature->photo);
                $photo = md5($this->photo . microtime()).'.'.$this->photo->extension();
                $this->photo->storeAs('candidatures', $photo);
            }else{
                
                $photo = $candidature->photo;

            }
            $candidature->update([
                'nom' => $this->nom,
                'prenom' => $this->prenom,
                'email' => $this->email,
                'matricule' => $this->matricule,
                'typecandidature_id' => $this->typecandidature_id,
                'date_naissance' => $this->date_naissance,
                'lieu_naissance' => $this->lieu_naissance,
                'point_bac' => $this->point_bac,
                'contact' => $this->contact,
                'identifiant_permanent' => $this->identifiant_permanent,
                'telephone' => $this->telephone,
                'status' => $this->status,
                'serie' => $this->serie,
                'centre_composition' => $this->centre_composition,
                'filiere_id' => $this->filiere_id,
                'ville_composition' => $this->ville_composition,
                'numero_bts' => $this->numero_bts,
                'ecole_origine' => $this->ecole_origine,
                'numero_table' => $this->numero_table,
                'sexe' => $this->sexe,
                'nationalite_id' => $this->nationalite_id,
                'photo' => $photo,
            ]);
            $this->alert('success', 'Candidature modifiée avec success');
            $this->reset();
            $this->mode = false;

        }

    public function render()
    {
        return view('livewire.candidature', [
            'allCandidatures' => ModelsCandidature::searchCandidature($this->search)->filterUserCandidature()->paginate(10),
            'allTypeCandidature'=> TypeCandidature::all(),
            'allFilieres'=> Filiere::all(),
            'allNationalites'=> Nationnalite::all()
        ]);
    }
}
