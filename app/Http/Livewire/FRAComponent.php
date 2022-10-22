<?php

namespace App\Http\Livewire;

use App\Models\ForeignAgency;
use Livewire\Component;

class FRAComponent extends Component
{
    public string $fraKey = '';

    public array $fra = [];

    public function render()
    {
        $this->fra = ForeignAgency::query()
                                  ->select(['id', 'agency_name'])
                                  ->where('agency_id', auth()->user()->agency_id)
                                  ->get()
                                  ->toArray();

        return view('livewire.f-r-a-component');
    }

    public function addFRA()
    {
        ForeignAgency::create([
            'agency_id' => auth()->user()->agency_id,
            'agency_name' => $this->fraKey,
        ]);

        $this->fraKey = '';
        $this->fra    = ForeignAgency::query()
                                     ->select(['id', 'agency_name'])
                                     ->where('agency_id', auth()->user()->agency_id)
                                     ->get()
                                     ->toArray();
    }

    public function deleteFRA($id)
    {
        ForeignAgency::destroy($id);
        $this->fra = ForeignAgency::query()
                                  ->select(['id', 'agency_name'])
                                  ->where('agency_id', auth()->user()->agency_id)
                                  ->get()
                                  ->toArray();
    }
}
