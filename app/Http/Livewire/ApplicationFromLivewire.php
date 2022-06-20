<?php

namespace App\Http\Livewire;

use App\Models\Candidate;
use Faker\Factory;
use Livewire\Component;

class ApplicationFromLivewire extends Component
{
    public array $details = [];

    public int $childrenCount = 0;

    public array $children = [];

    public array $workHistory = [];

    public function mount()
    {
        $this->generateCode();
    }

    public function render()
    {
        return view('livewire.application-from-livewire');
    }

    public function generateCode()
    {
        do {
            $code = Factory::create()->bothify(now()->format('y').'#?#?'.now()->format('m'));
        } while (Candidate::query()->where('code', $code)->count() > 0);

        $this->details['code'] = $code;
    }

    public function addChildren()
    {
        $this->children[] = [
            'candidate_id' => null,
            'fullname'     => "",
            'gender'       => "",
            'age'          => "",
            'birthdate'    => "",
        ];
    }

    public function childUnset($index)
    {
        unset($this->children[$index]);
    }

    public function addWorkHistory()
    {
        $this->workHistory[] = [
            'candidate_id' => null,
            'country'      => "",
            'position'     => "",
            'year'         => "",
        ];
    }

    public function workUnset($index)
    {
        unset($this->workHistory[$index]);
    }
}
