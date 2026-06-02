<?php

namespace App\Filament\Widgets;

use App\Models\Graduation;
use App\Models\Setting;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class KelulusanStats extends StatsOverviewWidget
{
    protected function getStats(): array
{
    $setting = Setting::first();

    $tahunPelajaran = $setting?->academic_year ?? '-';

    $jumlahSiswa = Graduation::count();

    $jumlahLulus = Graduation::where('status', 'LULUS')->count();

    $jumlahTidakLulus = Graduation::where('status', 'TIDAK LULUS')->count();

    $persentaseKelulusan = $jumlahSiswa > 0
        ? round(($jumlahLulus / $jumlahSiswa) * 100, 2)
        : 0;

    $tanggalPengumuman = $setting?->announcement_date
        ? Carbon::parse($setting->announcement_date)->format('d M Y H:i')
        : '-';

    return [

        Stat::make('Tahun Pelajaran Aktif', $tahunPelajaran)
            ->description('Tahun pelajaran yang digunakan'),

        Stat::make('Jumlah Siswa', $jumlahSiswa)
            ->description('Total data siswa'),

        Stat::make('Lulus', $jumlahLulus)
            ->description('Jumlah siswa lulus'),

        Stat::make('Tidak Lulus', $jumlahTidakLulus)
            ->description('Jumlah siswa tidak lulus'),

        Stat::make(
            'Persentase Kelulusan',
            $persentaseKelulusan . '%'
        )
            ->description('Tingkat kelulusan'),

        Stat::make('Tanggal Pengumuman', $tanggalPengumuman)
            ->description('Jadwal pengumuman'),

    ];
}
}
