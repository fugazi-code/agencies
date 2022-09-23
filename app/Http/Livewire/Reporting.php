<?php

namespace App\Http\Livewire;

use App\Models\Candidate;
use Livewire\Component;

class Reporting extends Component
{
    public $code = '8r2j092222';

    public $candidate = [];

    public function render()
    {
        return view('livewire.reporting')->layout('layouts.guest');
    }

    public function showDetails()
    {
        $this->candidate = Candidate::query()->where('code', $this->code)->first()->toArray();
    }

    public function resetValues()
    {
        $this->candidate = [];
    }
}
