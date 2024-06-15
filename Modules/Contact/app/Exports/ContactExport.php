<?php

namespace Modules\Contact\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Modules\Contact\Models\Contact;

class ContactExport implements FromCollection, WithHeadings, WithColumnWidths
{
    public function headings(): array
    {
        return [
            'name', 'phone_number', 'email', 'subject', 'message'
        ];
    }

    /**
     * @return Collection
     */
    public function collection()
    {
        return Contact::select('name', 'phone_number', 'email', 'subject', 'message')->get();
    }

    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 20,
            'C' => 25,
            'D' => 50,
            'E' => 75,
        ];
    }
}
