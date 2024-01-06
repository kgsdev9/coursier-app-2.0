<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Validation;
use App\Models\Candidature;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AllCandidature extends Component
{
    public $search ;

    use WithPagination;
    use LivewireAlert;


    protected $paginationTheme = 'bootstrap';

    public function valider($id) {
        $candidature =  Candidature::find($id);

        $okay =   Validation::where('candidature_id', '=', $candidature->id)
                     ->exists();
         if($okay) {
            $this->alert('warning', 'Cette candidature a été validée avec succes');
         } else {
            Validation::create([
                'code_candidature'=> rand(100, 200),
                'etat'=> 'valide',
                'justificatif'=> 'candidature validée',
                'qrcode'=> 'generate',
                'candidature_id'=> $candidature->id
            ]);
            $this->alert('success', 'Candidature validée avec success');
            return redirect()->back();
         }

     }

    public function render()
    {
        return view('livewire.admin.all-candidature', [
            'allCandidatures' => Candidature::where('nom', 'like', '%'. $this->search. '%')->orderByDesc('created_at')->paginate(10),
        ]);
    }
}
