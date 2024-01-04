<?php

namespace App\Livewire;

use App\Models\Compte;
use Livewire\Component;
use App\Models\Validation;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
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
    $identifiant_permanent, $telephone, $serie, $centre_composition,
     $numero_bts, $mention, $point_bac, $ecole_origine, $sexe,
     $numero_table, $anne_academec_id, $mode, $editMode, $search, $oldImage;


        protected $rules = [
        'nom' => 'required',
        'prenom' => 'required' ,
        'email'=> 'required',
        'photo'=>  'nullable',
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
            $this->validate();

            $name = md5($this->photo . microtime()).'.'.$this->photo->extension();
            $this->photo->storeAs('photos', $name);

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
                'numero_table' => $this->numero_table,
                'sexe' => $this->sexe,
                'photo' => $name,
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


        public function edit($id){

            try {
                $candidature = ModelsCandidature::findOrFail($id);
                if( !$candidature) {
                    session()->flash('error','Aucune candidature trouvée');
                } else {
                    $this->nom = $candidature->nom;
                    $this->prenom = $candidature->prenom;
                    $this->email = $candidature->email;
                    $this->matricule = $candidature->matricule;
                    $this->identifiant_permanent = $candidature->identifiant_permanent;
                    $this->telephone = $candidature->telephone;
                    $this->serie = $candidature->serie;
                    $this->centre_composition = $candidature->centre_composition;
                    $this->ville_composition = $candidature->ville_composition;
                    $this->numero_bts = $candidature->numero_bts;
                    $this->mention = $candidature->mention;
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
                $this->photo->storeAs('photos', $photo);
            }else{
                $photo = $candidature->photo;

            }
            $candidature->update([
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
                    'numero_table' => $this->numero_table,
                    'sexe' => $this->sexe,
                    'photo' => $photo,
            ]);
            $this->alert('success', 'Candidature modifiée avec success');
            $this->reset();
            $this->mode = false;

        }

    public function render()
    {
        return view('livewire.candidature', [
            'allCandidatures' => ModelsCandidature::searchCandidature($this->search)->filterUserCandidature()->paginate(10)
        ]);
    }
}
