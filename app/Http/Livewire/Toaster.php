<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Toaster extends Component
{
    protected $listeners = ['callToaster' => 'toast'];

    public $message = '';

    public function render()
    {
        return view('livewire.toaster');
    }

    public function toast($attribute)
    {
        $this->emit('refreshDatatable');
        $this->message = $attribute['message'];
        $this->dispatchBrowserEvent('toaster-js');
    }
}
