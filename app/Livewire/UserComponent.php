<?php

namespace App\Livewire;

use App\Models\Candidature;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;


class UserComponent extends Component
{
    use WithPagination;
    public $search;

    protected $queryString = ['search'];

    public function render()
    {
        return view('livewire.user-component', [
            'allusers' => User::where('name', 'like', '%'.$this->search.'%')->paginate(12),
        ])->extends('layouts.app')->section('content');
    }
}
