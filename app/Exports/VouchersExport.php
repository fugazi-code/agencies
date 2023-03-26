<?php

namespace App\Exports;

use App\Models\Voucher;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class VouchersExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings, WithEvents
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Voucher::all();
    }

    public function map($voucher): array
    {
        return[
            $voucher->id,
            $voucher->source,
            $voucher->name,
            $voucher->created_at,
            $voucher->medical_allowance,
            $voucher->vaccine_fare,
            $voucher->ticket,
        ];
    }

    public function headings(): array
    {
        return[
            '#',
            'Source',
            'Name of Deployed Workers',
            'Date Deployed',
            'Medical(Peso)',
            'Vaccine(Peso)',
            'Ticket(USD)',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->getStyle('A1:G1')->applyFromArray([
                    'font'=> ['bold'=>true]
                ]);
            },
        ];
    }
}
