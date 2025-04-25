<?php
namespace App\Exports;

use App\Models\Animal;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AnimalsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Animal::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Type',
            'Breed',
            'Age',
            'Location',
            'Health Notes',
            'Feeding Schedule',
            'Status',
            'Created At',
            'Updated At'
        ];
    }
}