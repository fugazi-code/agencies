<?php

namespace App\Http\Livewire;

use Gridjs\ApplicantTableGridjs;
use Livewire\Component;

class ApplicantsLivewire extends Component
{
    public function render()
    {
        return view('livewire.applicants-livewire',
            ['applicantTable' => app(ApplicantTableGridjs::class)->make(route('applicant.get'))]
        );
    }
}
