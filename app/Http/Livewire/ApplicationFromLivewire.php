<?php

namespace App\Http\Livewire;

use App\Models\Candidate;
use App\Models\Children;
use App\Models\EmploymentHistory;
use App\Models\LanguageLevel;
use App\Models\Skill;
use Faker\Factory;
use Livewire\Component;
use Livewire\WithFileUploads;

class ApplicationFromLivewire extends Component
{
    use WithFileUploads;

    public array $details = [];

    public int $childrenCount = 0;

    public array $children = [];

    public array $workHistory = [];

    public array $languageLevel = [];

    public array $skills = [];

    public $photo_url;

    public $picfull;

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
            'birthdate'    => null,
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

    public function addLanguage()
    {
        $this->languageLevel[] = [
            'candidate_id' => null,
            'language'     => "",
            'level'        => "",
        ];
    }

    public function languageUnset($index)
    {
        unset($this->languageLevel[$index]);
    }

    public function addSkills()
    {
        $this->skills[] = [
            'candidate_id' => null,
            'remarks'      => "",
            'skill'        => "",
        ];
    }

    public function skillUnset($index)
    {
        unset($this->skills[$index]);
    }

    public function store()
    {
        if($this->photo_url) {
            $this->details['photo_url'] = $this->photo_url->store('applicant');
        }
        if($this->picfull) {
            $this->details['picfull'] = $this->picfull->store('applicant');
        }

        $id = Candidate::query()->insertGetId($this->details);

        foreach ($this->children as $child) {
            $child['candidate_id'] = $id;
            Children::query()->create($child);
        }

        foreach ($this->workHistory as $work) {
            $work['candidate_id'] = $id;
            EmploymentHistory::query()->create($work);
        }

        foreach ($this->languageLevel as $language) {
            $language['candidate_id'] = $id;
            LanguageLevel::query()->create($language);
        }

        foreach ($this->skills as $skill) {
            $skill['candidate_id'] = $id;
            Skill::query()->create($skill);
        }

        return redirect()->route('applicants');
    }
}
