<?php

namespace App\Http\Livewire;

use App\Models\Rescue;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class RescueTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make('IP Address', 'ip_address')
                  ->sortable(),
            Column::make('OFW name', 'last_name')
                  ->format(function ($value, $row, $data) {
                      return $data['last_name'].', '.$data['first_name'];
                  })
                  ->sortable(),
            Column::make('Locate', 'id')
                  ->format(function ($value, $row, $data) {
                      $route = route('map', [
                          'latitude' => $data['actual_latitude'],
                          'longitude' => $data['actual_longitude'],
                      ]);

                      return "<a href='$route' target='_blank' class='btn btn-link m-0'>Locate</a>";
                  })
                  ->asHtml()
                  ->sortable(),
        ];
    }

    public function query(): Builder
    {
        return Rescue::query()
                     ->join('candidates as c', 'c.id', '=', 'rescues.candidate_id');
    }
}
