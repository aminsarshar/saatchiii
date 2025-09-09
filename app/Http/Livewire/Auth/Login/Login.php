<?php

namespace App\Http\Livewire\Auth\Login;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;
    public $errorMessage;

    public function login()
    {
        $validated = $this->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    if (! Auth::attempt($validated, $this->remember)) {
        $this->errorMessage = 'ایمیل یا رمز عبور اشتباه است.';

        // به جاوااسکریپت بگو مودال رو باز نگه داره
        $this->emit('keepModalOpen');
        return;
    }

    session()->regenerate();

    return redirect()->intended('home.index');
    }


    public function render()
    {
        return view('livewire.auth.login.login');
    }
}
