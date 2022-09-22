<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Reporting extends Component
{
    public function render()
    {
        return view('livewire.reporting')->layout('layouts.guest');
    }
}
