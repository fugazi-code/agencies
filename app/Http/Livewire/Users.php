<?php

namespace App\Http\Livewire;

use App\Models\Agency;
use Livewire\Component;

class Users extends Component
{
    public array $agencies = [];

    public array $details = [];

    public function mount()
    {
        $this->agencies = Agency::list();
    }

    public function updating()
    {
        validator($this->details, [
            ''
        ]);
    }
    public function render()
    {
        return view('livewire.users');
    }
}
