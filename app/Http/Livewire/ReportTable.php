<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Report;

class ReportTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Reportable id", "reportable_id")
                ->sortable(),
            Column::make("Reportable type", "reportable_type")
                ->sortable(),
            Column::make("Created by", "created_by")
                ->sortable(),
            Column::make("Salary received", "salary_received")
                ->sortable(),
            Column::make("Salary date", "salary_date")
                ->sortable(),
            Column::make("Remarks", "remarks")
                ->sortable(),
            Column::make("Priority level", "priority_level")
                ->sortable(),
            Column::make("Deleted at", "deleted_at")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }

    public function query(): Builder
    {
        return Report::query();
    }
}
