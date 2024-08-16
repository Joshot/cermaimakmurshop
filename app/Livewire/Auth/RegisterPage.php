<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\User;


#[Title('Register')]

class RegisterPage extends Component {

    public $name;
    public $email;
    public $password;

    //Register User
    public function save(){
        $this->validate([
           'name' => 'required|max:255',
           'email' => 'required|email|unique:users|max:255',
           'password' => 'required|min:8|max:255'
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        //login user
        auth()->login($user);

        //redirect to home page
        return redirect()->intended();

    }




    public function render()
    {
        return view('livewire.auth.register-page');
    }
}
