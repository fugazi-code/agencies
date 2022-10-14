<?php

namespace App\Http\Livewire;

use App\Models\Voucher;
use Livewire\Component;

class DashboardLivewire extends Component
{
    public int $totalVoucher = 0;

    public function render()
    {
        $this->totalVoucher = Voucher::query()->where('agency_id', auth()->user()->agency_id)->count();

        return view('livewire.dashboard');
    }
}
