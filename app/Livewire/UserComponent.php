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

    public $search, $mode= true, $email, $name, $password, $role_id, $userId;

    protected $queryString = ['search'];


    protected $rules = [
        'name'=> 'required',
        'email'=> 'required',
        'password'=> 'required',
        'role_id'=> 'required',
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
        $this->name = $user->name;
        $this->email = $user->email;
        $this->userId = $user->id;
        $this->role_id = $user->role_id;
        $this->password = $user->password;
    }

    public function createUser()  {
         $this->validate();
         User::create([
             'name'=> $this->name,
             'email'=> $this->email,
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
                'name'=> $this->name,
                'email'=> $this->email,
                'password'=> Hash::make($this->password),
                'role_id'=> $this->role_id,
            ]);
            $this->mode  = true ;
            $this->reset('name', 'email', 'password', 'role_id');
    }



    public function render()
    {
        return view('livewire.user-component', [
            'allusers' => User::where('name', 'like', '%'.$this->search.'%')->paginate(12),
            'allRoles'=>  Role::all()
        ])->extends('layouts.app')->section('content');
    }
}
