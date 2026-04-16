<?php

namespace App\Exports;

use App\Models\Lending;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LendingsExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Lending::with('item', 'handledBy', 'returnedBy')->get();
    }

    public function headings(): array
    {
        return [
            'Item Name',
            'Total',
            'Borrower Name',
            'Reason',
            'Date',
            'Returned At',
            'Handled By',
            'Returned By'
        ];
    }

    public function map($lending): array
    {
        return [
            $lending->item->name ?? '-',
            $lending->total,
            $lending->borrower_name,
            $lending->reason,
            Carbon::parse($lending->date)->translatedFormat('j F Y'),
            $lending->returned_at ? Carbon::parse($lending->returned_at)->translatedFormat('j F Y') : '-',
            $lending->handledBy->name ?? '-',
            $lending->returnedBy->name ?? '-',
        ];
    }
}
