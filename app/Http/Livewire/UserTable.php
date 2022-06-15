<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;

class UserTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make("Agency", "users.*")
                ->format(fn($id) => view('buttons.actions-voucher', ['id' => $id]))
                ->sortable()
                ->asHtml(),
            Column::make("Agency", "agency.name")
                ->sortable(),
            Column::make("User", "information.name")
                ->sortable(),
            Column::make("Email", "email")
                ->sortable(),
        ];
    }

    public function query(): Builder
    {
        return User::query()
            ->leftJoin('information', 'information.user_id', '=', 'users.id')
            ->leftJoin('agencies as agency', 'agency.id', '=', 'users.agency_id');
    }
}
