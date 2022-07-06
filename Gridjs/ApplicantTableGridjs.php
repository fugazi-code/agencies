<?php

namespace Gridjs;

use App\Models\Applicant;
use App\Models\Candidate;
use Carbon\Carbon;
use Throwexceptions\LaravelGridjs\LaravelGridjs;

class ApplicantTableGridjs extends LaravelGridjs
{
    public function config()
    {
        return $this->setQuery(model: Candidate::query()->with(['tags']))
                    ->editColumn('action',
                        fn($value) => view('buttons.action-applicant', ['candidateId' => $value['id']]))
                    ->editColumn('status', fn($value) => view('livewire.partials.tags', compact('value')))
                    ->editColumn('date_hired', fn($value) => Carbon::parse($value['date_hired'])->format('F j, Y'));
    }

    public function columns(): array
    {
        return [
            'action' => [
                'name' => 'Action',
                'sort' => ['enabled' => false],
                'width' => 'auto',
                'searchable' => false,
            ],
            'status' => [
                'name' => 'Status',
                'sort' => ['enabled' => false],
                'width' => '15%',
                'searchable' => false,
            ],
            'date_hired' => 'Date Hired',
            'code' => 'Code',
            'fullname' => 'Full Name',
            'gender' => 'Gender',
            'position_selected' => 'Position Selected',
        ];
    }
}

