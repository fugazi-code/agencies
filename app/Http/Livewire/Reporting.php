<?php

namespace App\Http\Livewire;

use App\Models\Candidate;
use Livewire\Component;

class Reporting extends Component
{
    public $code = '0v2v092322';

    public $candidate = [];

    public $remarks = '';

    public $salary = '';

    public function render()
    {
        return view('livewire.reporting')->layout('layouts.guest');
    }

    public function showDetails()
    {
        $this->validate([
            'code' => 'required|exists:candidates,code'
        ]);
        $this->candidate = Candidate::query()->where('code', $this->code)->first()->toArray();
    }

    public function resetValues()
    {
        $this->candidate = [];
        $this->remarks = '';
    }

    public function submitReport()
    {
        $this->validate([
            'remarks' => 'required',
            'salary' => 'required'
        ]);

        $candidate = Candidate::find($this->candidate['id']);

        $candidate->report()->create([
            'remarks' => $this->remarks
        ]);

        $this->emit('callToaster', ['message' => 'Report has been submitted!']);
        $this->resetValues();
    }
}
