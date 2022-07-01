<?php

namespace App\Http\Livewire;

use App\Models\Candidate;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ApplicantsTable extends DataTableComponent
{
    public string $defaultSortColumn    = 'date_hired';
    public string $defaultSortDirection = 'desc';

    public function columns(): array
    {
        return [
            Column::make('Action', 'id')
                ->format(fn($value) => view('buttons.actions-application',
                    ['link' => route('applicant.form', ['candidate_id' => encrypt($value)])])),
            Column::make("Date hired", "date_hired")
                ->format(fn($value) => $value ? Carbon::parse($value)->format('F j, Y') : '')
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
