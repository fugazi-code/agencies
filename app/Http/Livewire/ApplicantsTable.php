<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Candidate;

class ApplicantsTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Date hired", "date_hired")
                ->sortable(),
            Column::make("Code", "code")
                ->sortable(),
            Column::make("First name", "first_name")
                ->sortable(),
            Column::make("Last name", "last_name")
                ->sortable(),
            Column::make("Middle name", "middle_name")
                ->sortable(),
            Column::make("Gender", "gender")
                ->sortable(),
            Column::make("Status", "status")
                ->sortable(),
        ];
    }

    public function query(): Builder
    {
        return Candidate::query();
    }
}
