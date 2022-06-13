<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public ?string $email = '';
    public ?string $password = '';

    protected $rules = [
        'email'    => 'required|email|max:50',
        'password' => 'required',
    ];

    public function mount()
    {
        if(!Auth::guest()) {
            return redirect()->route('dashboard');
        }
    }

    public function render()
    {
        return view('livewire.login');
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function authenticate()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            Auth::loginUsingId(User::query()->where('email', $this->email)->first()->id);

            return redirect()->route('dashboard');
        }
    }
}
