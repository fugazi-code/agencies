<?php

namespace App\Http\Livewire;

use App\Models\Voucher;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class DeploymentsTable extends DataTableComponent
{

    public function query(): Builder
    {
        return Voucher::selectRaw('vouchers.*, voucher_statuses.status_date,
        deployments.type,deployments.ppt,deployments.fit,deployments.contract_signing')
            ->where('vouchers.status', 'deployed')
            ->leftJoin('voucher_statuses', 'voucher_statuses.voucher_id', '=', 'vouchers.id')
            ->leftJoin('deployments', 'deployments.voucher_id', '=', 'vouchers.id');
    }

    public function columns(): array
    {
        return [
            Column::make("ID", "id")
                ->format(function ($value, $row, $data) {
                    return view('buttons.deployment-action', ['id' => $value]);
                })
                ->asHtml(),
            Column::make("Applicant", "name")
                ->searchable()
                ->sortable(),
            Column::make("Source", "source")
                ->searchable()
                ->sortable(),
            Column::make("Source", "vouchers.status")
                ->searchable()
                ->sortable(),
            Column::make("Status Date", "voucher_statuses.status_date")
                ->sortable(),
            Column::make("Type", "deployments.type")
                ->searchable()
                ->sortable(),
            Column::make("Ppt", "deployments.ppt")
                ->sortable(),
            Column::make("Fit to Work", "deployments.fit")
                ->sortable(),
            Column::make("Contract signing", "deployments.contract_signing")
                ->sortable(),
        ];
    }
}
