<?php

namespace App\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use App\Models\Candidature;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;

class UserComponent extends Component
{
    use WithPagination;

    public $search, $telephone, $lieu_de_residence, $mode= true, $email, $fullname, $password, $role_id, $userId;

    protected $queryString = ['search'];


    protected $rules = [
        'fullname'=> 'required',
        'email'=> 'required',
        'password'=> 'required',
        'role_id'=> 'required',
        'telephone'=> 'required',
        'lieu_de_residence'=> 'required',
    ];
    public function displayForm() {
        return $this->mode = false;
    }

    public function delete(User $user) {
        $candidarture = Candidature::where('user_id', $user->id)->delete();
        $user->delete();
        return redirect()->route('login');
    }

    public function edit(User $user) {
        $this->mode = false;
        $this->fullname = $user->fullname;
        $this->email = $user->email;
        $this->telephone = $user->telephone;
        $this->lieu_de_residence = $user->lieu_de_residence;
        $this->userId = $user->id;
        $this->role_id = $user->role_id;
        $this->password = $user->password;
    }

    public function createUser()  {
         $this->validate();
         User::create([
             'fullname'=> $this->fullname,
             'email'=> $this->email,
             'telephone'=> $this->telephone,
             'lieu_de_residence'=> $this->lieu_de_residence,
             'password'=> Hash::make($this->password),
             'role_id'=> $this->role_id,
         ]);
         $this->reset();
         $this->mode= true;
     }

    public function update()
    {
        $this->validate();

         $marque = User::findOrFail($this->userId);
            $marque->update([
                'fullname'=> $this->fullname,
                'email'=> $this->email,
                'telephone'=> $this->telephone,
                'lieu_de_residence'=> $this->lieu_de_residence,
                'password'=> Hash::make($this->password),
                'role_id'=> $this->role_id,
            ]);
            $this->mode  = true ;
            $this->reset('name', 'email', 'password', 'role_id');
    }



    public function render()
    {
        return view('livewire.user-component', [
            'allusers' => User::where('fullname', 'like', '%'.$this->search.'%')->orderByDesc('created_at')->paginate(12),
            'allRoles'=>  Role::all()
        ])->extends('layouts.app')->section('content');
    }
}
