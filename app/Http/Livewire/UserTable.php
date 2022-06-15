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
            Column::make("Actions", "id")
                ->format(fn($id) => view('buttons.actions',
                    ['id' => $id, 'listener' => 'hello', 'modal' => 'userEditModal']))
                ->asHtml(),
            Column::make("Agency", "agency.name")
                ->searchable()
                ->sortable(),
            Column::make("User", "information.name")
                ->searchable()
                ->sortable(),
            Column::make("Email", "email")
                ->searchable()
                ->sortable(),
        ];
    }

    public function query(): Builder
    {
        return User::query()
            ->leftJoin('information', 'information.id', '=', 'users.information_id')
            ->leftJoin('agencies as agency', 'agency.id', '=', 'users.agency_id');
    }
}
