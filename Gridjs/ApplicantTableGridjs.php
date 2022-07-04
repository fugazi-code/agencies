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
        return $this->setQuery(model: Candidate::query())
                    ->editColumn('action', function ($value) {
                        return view('buttons.action-applicant', ['candidateId' => $value['id']]);
                    })
                    ->editColumn('gender', function ($value) {
                        return "<strong>{$value['gender']}</strong>";
                    })
                    ->editColumn('date_hired', function ($value) {
                        return Carbon::parse($value['date_hired'])->format('F j, Y');
                    });
    }

    public function columns(): array
    {
        return [
            'action'   => [
                'name'     => 'Action',
                'sortable' => false,
                'width' => 'auto'
            ],
            'date_hired' => 'Date Hired',
            'code' => 'Code',
            'fullname' => 'Full Name',
            'gender' => 'Gender',
            'position_selected' => 'Position Selected'
        ];
    }
}

