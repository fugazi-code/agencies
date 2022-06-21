<?php

namespace App\Http\Livewire;

use App\Models\Agency;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public ?string $email       = '';
    public ?string $password    = '';
    public ?string $agency      = '';
    public ?string $photo_link  = '';
    protected      $queryString = ['agency'];
    protected      $rules       = [
        'email'    => 'required|email|max:50',
        'password' => 'required',
    ];

    public function mount()
    {
        $this->photo_link = Agency::find($this->agency)?->logo_path;

        if (! Auth::guest()) {
            return redirect()->route('dashboard');
        }
    }

    public function render()
    {
        session(['agency' => $this->agency]);
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
