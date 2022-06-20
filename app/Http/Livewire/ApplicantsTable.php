<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Candidate;

class ApplicantsTable extends DataTableComponent
{
    public string $defaultSortColumn = 'date_hired';
    public string $defaultSortDirection = 'desc';

    public function columns(): array
    {
        return [
            Column::make('Action', 'id')
                ->format(fn($value) => view('buttons.actions',
                    ['link' => route('applicant.form', ['candidate_id' => encrypt($value)])])),
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
            Column::make("Row ID", "id")
                ->sortable(),
        ];
    }

    public function query(): Builder
    {
        return Candidate::query();
    }
}
