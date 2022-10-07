<?php

namespace App\Http\Livewire;

use App\Models\JobOrder;
use App\Models\User;
use App\Models\Voucher;
use App\Models\VoucherStatus;
use Livewire\Component;

class VoucherLivewire extends Component
{
    public array $params = [];

    public array $accounts = [];

    public array $details = [];

    public array $voucherStatus = [];

    public array $jobOrder = [];

    protected $listeners = ['editVoucher' => 'edit', 'editJobOrder' => 'editJobOrder'];

    public function mount()
    {
        $this->params['account'] = auth()->id();
        $this->accounts          = User::query()
                                       ->select(['id', 'email'])
                                       ->where('agency_id', auth()->user()->agency_id)
                                       ->get()
                                       ->toArray();
    }

    public function render()
    {
        return view('livewire.vouchers');
    }

    public function updatedParams()
    {
        $this->emit('outsideFilter', $this->params);
    }

    public function updatedFiltered()
    {
        $this->emit('voucherFiltered');
    }

    public function edit($id)
    {
        $this->details = Voucher::query()->find($id)->toArray()[0];
        $this->voucherStatus  = VoucherStatus::query()->where('voucher_id', $id['id'])->first()?->toArray() ?? [];
    }

    public function editJobOrder($id)
    {
        $this->details = Voucher::query()->find($id)->toArray()[0];
        $this->jobOrder = JobOrder::query()->where('voucher_id', $id)->first()?->toArray() ?? [];
    }

    public function store()
    {
        $params = array_merge($this->details, ['created_by' => auth()->id(), 'agency_id' => auth()->user()->agency_id]);
        Voucher::query()->updateOrCreate(['id' => $this->details['id'] ?? null], $params);
        $this->emit('callToaster', [
            'message' => isset($this->details['id']) ? 'Voucher has been updated!' : 'New Voucher has been Added!',
        ]);
        $this->details = [];
    }

    public function destroy()
    {
        Voucher::query()->find($this->details['id'])->delete();
        $this->emit('callToaster', ['message' => 'Voucher has been deleted!']);
        $this->details = [];
    }

    public function statusUpdate()
    {
        $this->validate([
           'voucherStatus.status' => 'required'
        ],[
            'voucherStatus.status.required' => 'Status is required.'
        ]);

        $voucher = Voucher::find($this->details['id']);
        $voucher->status = $this->voucherStatus['status'];
        $voucher->save();

        VoucherStatus::query()
                     ->updateOrCreate(
                         ['voucher_id' => $this->details['id']],
                         $this->voucherStatus
                     );

        $this->emit('callToaster', ['message' => 'Voucher Status Updated!']);
    }

    public function jobOrderUpdate()
    {
        JobOrder::query()
                     ->updateOrCreate(
                         ['voucher_id' => $this->details['id']],
                         $this->jobOrder
                     );

        $this->emit('callToaster', ['message' => 'Voucher Status Updated!']);
    }
}
