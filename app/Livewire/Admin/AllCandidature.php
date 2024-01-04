<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Candidature;

class AllCandidature extends Component
{
    public $search ;


    public function render()
    {
        return view('livewire.admin.all-candidature', [
            'allCandidatures' => Candidature::where('nom', 'like', '%'. $this->search. '%')->orderByDesc('created_at')->paginate(10),
        ]);
    }
}
