<?php

namespace App\Http\Livewire;

use App\Models\Voucher;
use Carbon\Carbon;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class VouchersTable extends DataTableComponent
{
    public array $filtered = [];
    public string $defaultSortColumn = 'created_at';
    public string $defaultSortDirection = 'desc';

    protected $listeners = [
        'voucherFiltered'  => 'setFiltered',
        'refreshDatatable' => '$refresh',
    ];

    public function setFiltered($attribute)
    {
        $this->filtered = $attribute;
        $this->refresh  = true;
    }

    public function columns(): array
    {
        return [
            Column::make('Action', 'id')
                ->format(fn($value) => view('buttons.actions',
                    ['id' => $value, 'listener' => 'editVoucher', 'modal' => 'voucherEditModal'])),
            Column::make("Created at", "created_at")
                ->sortable()
                ->format(fn($value) => Carbon::parse($value)->format('F j, Y H:iA')),
            Column::make("Created by", "users.email")
                ->sortable(),
            Column::make("Agency", "agency.name")
                ->sortable(),
            Column::make("Applicant Name", "name")
                ->searchable()
                ->sortable(),
            Column::make("Status", "status")
                ->searchable()
                ->sortable(),
            Column::make("Source", "source")
                ->searchable()
                ->sortable(),
            Column::make("Requirements", "requirements")
                ->searchable()
                ->sortable(),
            Column::make("Passporting allowance", "passporting_allowance")
                ->searchable()
                ->sortable(),
            Column::make("Ticket", "ticket")
                ->searchable()
                ->sortable(),
            Column::make("Tesda allowance", "tesda_allowance")
                ->searchable()
                ->sortable(),
            Column::make("Nbi renewal", "nbi_renewal")
                ->searchable()
                ->sortable(),
            Column::make("Medical allowance", "medical_allowance")
                ->searchable()
                ->sortable(),
            Column::make("Pdos", "pdos")
                ->searchable()
                ->sortable(),
            Column::make("Info sheet", "info_sheet")
                ->searchable()
                ->sortable(),
            Column::make("Owwa allowance", "owwa_allowance")
                ->searchable()
                ->sortable(),
            Column::make("Office allowance", "office_allowance")
                ->searchable()
                ->sortable(),
            Column::make("Travel allowance", "travel_allowance")
                ->searchable()
                ->sortable(),
            Column::make("Weekly allowance", "weekly_allowance")
                ->searchable()
                ->sortable(),
            Column::make("Medical follow up", "medical_follow_up")
                ->searchable()
                ->sortable(),
            Column::make("Nbi refund", "nbi_refund")
                ->searchable()
                ->sortable(),
            Column::make("Psa refund", "psa_refund")
                ->searchable()
                ->sortable(),
            Column::make("Passport refund", "passport_refund")
                ->searchable()
                ->sortable(),
            Column::make("Fare refund", "fare_refund")
                ->searchable()
                ->sortable(),
            Column::make("Red rebon nbi", "red_rebon_nbi")
                ->searchable()
                ->sortable(),
            Column::make("Fit to work", "fit_to_work")
                ->searchable()
                ->sortable(),
            Column::make("Repat", "repat")
                ->searchable()
                ->sortable(),
            Column::make("Stamping", "stamping")
                ->searchable()
                ->sortable(),
            Column::make("Vaccine fare", "vaccine_fare")
                ->searchable()
                ->sortable(),
        ];
    }

    public function query()
    {
        return Voucher::query()
            ->selectRaw('vouchers.*, users.email')
            ->where('vouchers.agency_id', auth()->user()->agency_id)
            ->join('users', 'users.id', '=', 'vouchers.created_by')
            ->when(
                isset($this->filtered['account']),
                fn($q) => $q->where('vouchers.created_by', $this->filtered['account']),
                fn($q) => $q->where('vouchers.created_by', auth()->id())
            );
    }
}
