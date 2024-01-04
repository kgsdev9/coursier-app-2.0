<?php

namespace App\Livewire;

use App\Models\Candidature;
use Livewire\Component;

class UserComponent extends Component
{

    public $search;

    protected $queryString = ['search'];

    public function render()
    {
        return view('livewire.user-component', [
            'posts' => Candidature::where('title', 'like', '%'.$this->search.'%')->get(),
        ])->extends('layouts.app')->section('content');
    }
}
