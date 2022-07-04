<?php

namespace Gridjs;

use App\Models\Document;
use Throwexceptions\LaravelGridjs\LaravelGridjs;

class DocumentTableGridjs extends LaravelGridjs
{
    public function config()
    {
        return $this->setQuery(model: Document::query());
    }

    public function columns(): array
    {
        return [
            'filename' => ['name' => 'Filename'],
            'path'     => ['name' => 'Path'],
            'type'     => ['name' => 'Type'],
        ];
    }
}

