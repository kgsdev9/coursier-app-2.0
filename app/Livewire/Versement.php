<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\Candidature;
use Livewire\WithPagination;
use App\Models\Versement as ModelsVersement;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Versement extends Component
{

    use WithPagination;
    use LivewireAlert;

    protected $paginationTheme = 'bootstrap';

    public $candidature_id, $montant, $search, $showCandidature, $codeTransaction, $mode = true;


   protected $rules = [
    'montant' => 'required'
   ];

    public function  form() {
        $this->mode = false;
    }

    public function displayCandidature(Candidature $candidature)  {
        $this->showCandidature = $candidature;
        $this->dispatch('openModal', []);

    }


    public function store() {
        $this->validate();
        ModelsVersement::create([
            'montant'=> $this->montant,
            'candidature_id'=> $this->showCandidature->id,
            'code_transaction'=> rand(100, 23300),
        ]);
        $this->alert('success', 'Versement ajoutée avec success');
        $this->reset();
        $this->dispatch('closeModal');
    }



    public function render()
    {
        return view('livewire.versement', [
            'allVersement'=> ModelsVersement::orderByDesc('created_at')->paginate(12),
            'allCandidatures'=> Candidature::searchCandidature($this->search)->orderByDesc('created_at')->paginate(10)
        ]);

    }
}
