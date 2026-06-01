<?php

namespace App\Imports;

use App\Models\Graduation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GraduationsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Graduation([
            'academic_year' => '2025/2026',
            'nisn' => $row['nisn'],
            'name' => $row['nama'],
            'class' => $row['kelas'],
            'status' => $row['status'],
        ]);
    }
}