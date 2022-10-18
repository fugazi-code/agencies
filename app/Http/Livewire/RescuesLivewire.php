<?php

namespace App\Http\Livewire;

use App\Models\Responds;
use Livewire\Component;

class RescuesLivewire extends Component
{

    public array $respond = [];

    public $listeners = ['bindFeedback' => 'feedback'];

    public function render()
    {
        return view('livewire.rescues-livewire');
    }

    public function feedback($reportID)
    {
        $this->respond = Responds::query()->where('rescue_id', $reportID)->get()->toArray();

        if(count($this->respond) == 0) {
            $this->respond = [
                'rescue_id' => $reportID,
                'status' => '',
                'feedback' => '',
            ];
        } else {
            $this->respond = $this->respond[0];
        }
    }

    public function submitFeedback()
    {
        $this->respond['inserted_by'] = auth()->id();

        Responds::query()->updateOrCreate(['rescue_id' => $this->respond['rescue_id']], $this->respond);
        $this->emit('callToaster', ['message' => 'Feedback has been submitted!']);
    }
}
