<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Deployment;

class DeploymentLivewire extends Component
{
    protected $listeners = ['editDeploy' => 'bind'];

    public $detail;

    public array $accounts = [];

    public array $params = [];

    public function mount()
    {
        $this->params['account'] = auth()->id();

        $this->accounts = User::query()
            ->select(['id', 'email'])
            ->where('agency_id', auth()->user()->agency_id)
            ->get()
            ->toArray();
    }

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

    public function updatedParams()
    {
        $this->emit('outsideFilter', $this->params);
    }

    public function resetDates()
    {
        $this->params['deployed_from'] = null;
        $this->params['deployed_to'] = null;
    }
}
