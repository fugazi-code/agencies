<?php

namespace App\Http\Livewire;

use App\Models\Candidate;
use Livewire\Component;

class DashboardAdminLivewire extends Component
{
    public array $results = [];

    public $keyword;

    public $keyIn = 0;

    public array $candidate = [];

    public function render()
    {
        return view('livewire.dashboard-admin-livewire');
    }

    public function searchCandidate()
    {
        $this->keyIn = $this->keyword ? 1 : 0;
        $model = Candidate::search($this->keyword ?: null)
                          ->paginate(10);

        $this->results = $model->load('agency')->toArray();
    }

    public function bindSearch($id, $keyword)
    {
        $this->keyIn = 0;
        $this->keyword = $keyword;

        $this->candidate = Candidate::query()->find($id)->toArray();
    }
}
