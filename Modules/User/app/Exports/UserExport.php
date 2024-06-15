<?php

namespace Modules\User\Exports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection, WithHeadings, WithColumnWidths
{
    public function headings(): array
    {
        return ['Name', 'Email', 'Mobile', 'Created At'];
    }

    /**
     * @return Collection
     */
    public function collection()
    {

        return User::select(['name', 'email', 'mobile', 'created_at'])->type()->latest()->get();

    }


    public function columnWidths(): array
    {
        return [
            'A' => 24,
            'B' => 24,
            'C' => 24,
            'D' => 24,
        ];
    }
}
