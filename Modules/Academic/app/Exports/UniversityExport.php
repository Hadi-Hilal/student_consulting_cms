<?php

namespace Modules\Academic\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Modules\Academic\Models\University;

class UniversityExport implements FromCollection, WithHeadings, WithColumnWidths
{
    public function headings(): array
    {
        return ['University Name', 'University Type', 'Local Rank', 'University Price', 'Discount'];
    }

    /**
     * @return Collection
     */
    public function collection()
    {
        // Fetch universities and map the data to include 'title' in English
        $universities = University::select(['title', 'type', 'rank', 'price', 'discount'])->get();

        // Format the data to return title in 'en'
        $data = $universities->map(function ($university) {
            return [
                'title' => $university->getTranslation('title', 'en'),
                'type' => $university->type,
                'rank' => $university->rank,
                'price' => $university->price . ' $',
                'discount' => $university->discount . ' %',
            ];
        });

        return new Collection($data);
    }


    public function columnWidths(): array
    {
        return [
            'A' => 28,
            'B' => 14,
            'C' => 14,
            'D' => 14,
            'E' => 14,

        ];
    }
}
