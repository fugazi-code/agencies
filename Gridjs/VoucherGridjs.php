<?php

namespace Gridjs;

use App\Models\Voucher;
use Carbon\Carbon;
use Throwexceptions\LaravelGridjs\LaravelGridjs;

class VoucherGridjs extends LaravelGridjs
{
    public function config()
    {
        $voucher = Voucher::query()
                          ->selectRaw('vouchers.*, users.email')
                          ->join('agencies', 'agencies.id', '=', 'vouchers.agency_id')
                          ->join('users', 'users.id', '=', 'vouchers.created_by')
                          ->when(request()->has('filtered'), function ($q) {
                              $q->where('users.id', auth()->id());
                          })
                          ->where('agencies.id', auth()->user()->agency_id);

        return $this->setQuery(model: $voucher)
                    ->setTargetForm('#former')
                    ->setSorter('created_at', 'desc')
                    ->enableFixedHeader('400px')
                    ->editColumn('actions', function ($value) {
                        return view('buttons.actions',
                            ['id' => $value['id'], 'listener' => 'editVoucher', 'modal' => 'voucherEditModal']);
                    })
                    ->editColumn('created_at', function ($value) {
                        return Carbon::parse($value['created_at'])->format('F j, Y');
                    });
    }

    public function columns(): array
    {
        return [
            "actions" => ['name' => '...', 'sort' => ['enabled' => false], 'formatter' => true, 'searchable' => false],
            "created_at" => ['name' => 'CREATED AT', 'formatter' => true, 'searchable' => false],
            "email" => 'CREATED BY',
            "vouchers.name" => 'APPLICANT NAME',
            "vouchers.status" => ['name' => 'STATUS'],
            "source" => 'SOURCE',
            "requirements" => 'REQUIREMENTS',
            "passporting_allowance" => 'PASSPORTING ALLOWANCE',
            "ticket" => 'TICKET',
            "tesda_allowance" => 'TESDA ALLOWANCE',
            "nbi_renewal" => 'NBI ALLOWANCE',
            "medical_allowance" => 'MEDICAL ALLOWANCE',
            "pdos" => 'PDOS',
            "info_sheet" => 'INFO SHEET',
            "owwa_allowance" => 'OWWA ALLOWANCE',
            "office_allowance" => 'OFFICE ALLOWANCE',
            "travel_allowance" => 'TRAVEL ALLOWANCE',
            "weekly_allowance" => 'WEEKLY ALLOWANCE',
            "medical_follow_up" => 'MEDICAL FOLLOW UP',
            "nbi_refund" => 'NBI REFUND',
            "psa_refund" => 'PSA REFUND',
            "passport_refund" => "PASSPORT REFUND",
            "fare_refund" => "FARE REFUND",
            "red_rebon_nbi" => "RED REBON NBI",
            "fit_to_work" => "FIT TO WORK",
            "repat" => "REPAT",
            "stamping" => "STAMPING",
            "vaccine_fare" => "VACCINE FARE",
        ];
    }
}

