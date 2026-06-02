<?php

namespace App\Exports;

use App\Models\Graduation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GraduationsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Graduation::select([
            'academic_year',

            'nisn',
            'name',
            'class',
            'status',

            'participant_number',
            'birth_place_date',

            'mtk_score',
            'indo_score',

            'mtk_category',
            'indo_category',
        ])->get();
    }

    public function headings(): array
    {
        return [
            'Tahun Pelajaran',

            'NISN',
            'Nama',
            'Kelas',
            'Status',

            'Nomor Peserta',
            'Tempat, Tanggal Lahir',

            'MTK',
            'INDO',

            'Kategori MTK',
            'Kategori INDO',
        ];
    }
}
