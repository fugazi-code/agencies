<?php

namespace Gridjs;

use App\Models\Document;
use Illuminate\Support\Facades\Storage;
use Throwexceptions\LaravelGridjs\LaravelGridjs;

class DocumentTableGridjs extends LaravelGridjs
{
    public function config()
    {
        return $this->setQuery(model: Document::query())
                    ->editColumn('action', function ($value){
                        return "<a href='". Storage::url($value['path']) ."' target='_blank'
                            class='btn btn-sm btn-info'><i class='fas fa-download'></i>
                            </a>
                            <a href='#' onclick=\"window.Livewire.emit('destroyDocs', {$value['id']})\"
                            class='btn btn-sm btn-danger'><i class='fas fa-trash'></i>
                            </a>";
                    });
    }

    public function columns(): array
    {
        return [
            'action'     => ['name' => 'Action'],
            'filename' => ['name' => 'Filename'],
            'type'     => ['name' => 'Type'],
        ];
    }
}

