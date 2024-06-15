<?php

namespace Modules\Subscriber\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Modules\Subscriber\Models\Subscriber;

class SubscriberExport implements FromCollection, WithHeadings, WithColumnWidths
{
    public function headings(): array
    {
        return [
            'email', 'lang'
        ];
    }

    /**
     * @return Collection
     */
    public function collection()
    {
        return Subscriber::select(['email', 'lang'])->get();
    }

    public function columnWidths(): array
    {
        return [
            'A' => 30,
        ];
    }
}
