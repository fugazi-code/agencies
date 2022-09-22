<?php

namespace Gridjs;

use App\Models\Candidate;
use Illuminate\Database\Eloquent\Builder;
use Throwexceptions\LaravelGridjs\LaravelGridjs;

class OFWMonitoringGridjs extends LaravelGridjs
{
    public function config()
    {
        return $this->setQuery(model: Candidate::query());
    }

    public function columns(): array
    {
        return [
            'id' => 'ID',
            'first_name' => 'Name',
            'deployed' => 'Deployed?',
            'passport' => 'Passport',
            'code' => 'Code',
        ];
    }
}

