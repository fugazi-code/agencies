<?php

namespace Gridjs;

use App\Models\Applicant;
use App\Models\Candidate;
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
            'fullname' => 'Full Name',
            'code' => 'Code',
            'gender' => 'Gender',
            'position_selected' => 'Position Selected'
        ];
    }
}

