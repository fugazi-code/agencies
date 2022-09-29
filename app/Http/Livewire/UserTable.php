<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class UserTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make("Actions", "prime_id")
                ->format(fn($id) => view('buttons.actions',
                    ['id' => $id, 'listener' => 'bindUserDetails', 'modal' => 'userEditModal']))
                ->asHtml(),
            Column::make("Email", "email")
                  ->searchable()
                  ->sortable(),
            Column::make("ID", "prime_id")
                ->sortable(),
            Column::make("Agency", "agency.name")
                ->searchable()
                ->sortable(),
            Column::make("User", "information.name")
                ->searchable()
                ->sortable(),
        ];
    }

    public function query(): Builder
    {
        return app(User::class)->tableQuery();
    }
}
