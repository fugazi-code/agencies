<?php

namespace App\Http\Livewire\Component;

use App\Models\Deprive;
use Livewire\Component;

class SidebarComponent extends Component
{
    public array $deprive = [];

    public function mount()
    {
        $this->deprive = Deprive::query()
                                ->where('agency_id', auth()->user()->agency_id)
                                ->toBase()
                                ->pluck('feature')
                                ->toArray();
    }

    public function render()
    {
        return view('livewire.component.sidebar-component');
    }
}
