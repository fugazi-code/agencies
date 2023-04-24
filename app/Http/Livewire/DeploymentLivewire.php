<?php

namespace App\Http\Livewire;

use App\Models\Deployment;
use Livewire\Component;

class DeploymentLivewire extends Component
{
    protected $listeners = ['editDeploy' => 'bind'];

    public $detail;

    public function render()
    {
        return view('livewire.deployment-livewire');
    }

    public function bind($value)
    {   
        $this->detail = Deployment::where('voucher_id', $value['id'])->first()?->toArray() ?? [];
        $this->detail['voucher_id'] = $value['id'];

        $this->dispatchBrowserEvent('deploy-modal');
    }

    public function store()
    {
        Deployment::updateOrCreate(
            ['voucher_id' => $this->detail['voucher_id'] ?? null],
            $this->detail
        );
        
        $this->dispatchBrowserEvent('deploy-modal');
        $this->emit('refreshDatatable');
        $this->emit('callToaster', ['message' => 'Deployment Status Updated!']);
    }
}
