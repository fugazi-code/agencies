<?php

namespace App\Http\Livewire;

use Gridjs\OFWMonitoringGridjs;
use Livewire\Component;

class OFWMonitoring extends Component
{
    public function render()
    {
        $this->dispatchBrowserEvent('tableUser1Render');

        return view('livewire.o-f-w-monitoring',
            ['tableUser' => app(OFWMonitoringGridjs::class)->make(route('ofw-monitoring.fetch'))]);
    }
}
