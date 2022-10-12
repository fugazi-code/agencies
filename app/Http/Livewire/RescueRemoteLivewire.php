<?php

namespace App\Http\Livewire;

use App\Models\Candidate;
use App\Models\Rescue;
use Livewire\Component;

class RescueRemoteLivewire extends Component
{
    public $code = '9z2x100822';

    public $candidate = [];

    public $form;

    public function render()
    {
        return view('livewire.rescue-remote-livewire')->layout('layouts.guest');
    }

    public function showDetails()
    {
        $this->validate([
            'code' => 'required|exists:candidates,code',
        ]);

        $this->candidate = Candidate::query()
                                    ->where('code', $this->code)
                                    ->join('vouchers as v', 'v.id', '=', 'candidates.voucher_id')
                                    ->first()
                                    ->toArray();
    }

    public function rescue()
    {
        Rescue::query()->updateOrCreate(['ip_address' => request()->ip()], [
            'candidate_id' => $this->candidate['id'],
            'ip_address' => request()->ip(),
            'actual_latitude' => $this->form['actual_latitude'],
            'actual_longitude' => $this->form['actual_longitude']
        ]);

        $this->emit('callToaster', ['message' => 'Alert has been submitted!']);
    }
}
