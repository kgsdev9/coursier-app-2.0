<?php

namespace App\Livewire;

use Livewire\Component;

class ConfirmadCommande extends Component
{
    public function render()
    {
        return view('livewire.confirmad-commande')->extends('layouts.app')->section('content');;
    }
}
