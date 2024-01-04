<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Validation;
use App\Models\Candidature;
use Livewire\WithPagination;

class AllCandidature extends Component
{
    public $search ;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function valider($id) {
        $candidature =  Candidature::find($id);

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
        return view('livewire.admin.all-candidature', [
            'allCandidatures' => Candidature::where('nom', 'like', '%'. $this->search. '%')->orderByDesc('created_at')->paginate(10),
        ]);
    }
}
