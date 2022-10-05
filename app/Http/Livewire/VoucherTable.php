<?php

namespace App\Http\Livewire;

use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class VoucherTable extends DataTableComponent
{
    protected $listeners = ['refreshDatatable' => '$refresh', 'outsideFilter'];

    public $params;

    public function outsideFilter($data)
    {
        $this->params = $data;
        $this->render();
    }

    public function query(): Builder
    {
        return Voucher::query()
                      ->selectRaw('vouchers.*, users.email, agencies.name as agency_name')
                      ->leftJoin('agencies', 'agencies.id', '=', 'vouchers.agency_id')
                      ->join('users', 'users.id', '=', 'vouchers.created_by')
                      ->when(isset($this->params['account']), function ($q) {
                          $q->where('users.id', $this->params['account']);
                      }, fn($q) => $q->where('users.id', auth()->id()));
    }

    public function columns(): array
    {
        return [
            Column::make("Action", "id")
                  ->format(function ($value) {
                      return view('buttons.actions',
                          ['id' => $value, 'listener' => 'editVoucher', 'modal' => 'voucherEditModal']);
                  })
                  ->asHtml(),
            Column::make("Total", "id")
                  ->format(function ($value, $column, $row) {
                      $total = 0;
                      foreach ($row->toArray() as $item) {
                          preg_match_all('/\(([\d\,\.]+)/', $item, $matches);
                          foreach ($matches[1] as $amount) {
                              $total += floatval(str_replace(',', '', $amount));
                          }
                      }

                      return number_format($total, 2);
                  })
                  ->asHtml(),
            Column::make("Status", "status")
                  ->sortable()
                  ->format(function ($value) {
                      if ($value == '') {
                          return '';
                      }

                      $message = $value == 'back-out' ? 'text-warning' : 'text-success';

                      return "<div class='spinner-grow $message' role='status'></div>".Str::upper($value);
                  })
                  ->searchable()
                  ->asHtml(),
            Column::make("Created at", "created_at")
                  ->sortable()
                  ->format(fn($value) => Carbon::parse($value)->format('F j, Y')),
            Column::make("Created by", "email")
                  ->sortable(),
            Column::make("Applicant's Name", "name")
                  ->sortable()
                  ->searchable(),
            Column::make("Source", "source")
                  ->sortable()
                  ->searchable(),
            Column::make("Requirements", "requirements")
                  ->sortable()
                  ->searchable(),
            Column::make("Passporting allowance", "passporting_allowance")
                  ->sortable()
                  ->searchable(),
            Column::make("Ticket", "ticket")
                  ->sortable()
                  ->searchable(),
            Column::make("Tesda allowance", "tesda_allowance")
                  ->sortable()
                  ->searchable(),
            Column::make("Nbi renewal", "nbi_renewal")
                  ->sortable()
                  ->searchable(),
            Column::make("Medical allowance", "medical_allowance")
                  ->sortable()
                  ->searchable(),
            Column::make("Pdos", "pdos")
                  ->sortable()
                  ->searchable(),
            Column::make("Info sheet", "info_sheet")
                  ->sortable()
                  ->searchable(),
            Column::make("Owwa allowance", "owwa_allowance")
                  ->sortable()
                  ->searchable(),
            Column::make("Office allowance", "office_allowance")
                  ->sortable()
                  ->searchable(),
            Column::make("Travel allowance", "travel_allowance")
                  ->sortable()
                  ->searchable(),
            Column::make("Weekly allowance", "weekly_allowance")
                  ->sortable()
                  ->searchable(),
            Column::make("Medical follow up", "medical_follow_up")
                  ->sortable()
                  ->searchable(),
            Column::make("Nbi refund", "nbi_refund")
                  ->sortable()
                  ->searchable(),
            Column::make("Psa refund", "psa_refund")
                  ->sortable()
                  ->searchable(),
            Column::make("Passport refund", "passport_refund")
                  ->sortable()
                  ->searchable(),
            Column::make("Fare refund", "fare_refund")
                  ->sortable()
                  ->searchable(),
            Column::make("Red rebon nbi", "red_rebon_nbi")
                  ->sortable()
                  ->searchable(),
            Column::make("Fit to work", "fit_to_work")
                  ->sortable()
                  ->searchable(),
            Column::make("Repat", "repat")
                  ->sortable()
                  ->searchable(),
            Column::make("Stamping", "stamping")
                  ->sortable()
                  ->searchable(),
            Column::make("Vaccine fare", "vaccine_fare")
                  ->sortable()
                  ->searchable(),
            Column::make("Updated at", "updated_at")
                  ->sortable()
                  ->format(fn($value) => Carbon::parse($value)->format('F j, Y')),
        ];
    }
}
