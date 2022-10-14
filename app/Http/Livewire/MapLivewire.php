<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MapLivewire extends Component
{
    public string $latitude = '';
    public string $longitude = '';

    protected $queryString = ['latitude', 'longitude'];

    public function render()
    {
        return view('livewire.map-livewire')->layout('layouts.guest');
    }
}
