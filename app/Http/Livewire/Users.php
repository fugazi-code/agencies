<?php

namespace App\Http\Livewire;

use App\Models\Agency;
use App\Models\Information;
use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public array $agencies = [];

    public array $details = [];

    public function mount()
    {
        $this->agencies = Agency::list();
    }

    public function render()
    {
        return view('livewire.users');
    }

    public function store()
    {
        $this->validate([
            'details.agency_id' => 'required',
            'details.name' => 'required',
            'details.role' => 'required',
            'details.email' => 'required|email',
            'details.password' => 'required|confirmed',
        ]);

        $information = Information::query()->create($this->details);

        $final = array_merge($this->details, ['information_id' => $information['id'], ]);
        User::query()->create($final);

        $this->details = [];
        $this->emit('callToaster', ['message' => 'New User has been Added!']);
    }
}
