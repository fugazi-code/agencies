<?php

namespace App\Http\Livewire;

use App\Models\Complains;
use Livewire\Component;

class CasesLivewire extends Component
{
    public array $detail;

    protected $listeners = ['editCase' => 'edit'];

    public function render()
    {
        return view('livewire.cases');
    }

    public function edit($id)
    {
        $this->detail = Complains::query()->find($id)->toArray();
    }
}
