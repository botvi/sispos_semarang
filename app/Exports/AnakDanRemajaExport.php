<?php

namespace App\Exports;

use App\Models\BulananAnakDanRemaja;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AnakDanRemajaExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Mengambil data anak dan remaja berdasarkan user yang sedang login
        $userId = Auth::id();
        return BulananAnakDanRemaja::where('user_id', $userId)->get([
            'tanggal_pelaksanaan',
            'kunjungan_anak_remaja',
            'imt_kurus',
            'imt_gemuk',
            'imt_obesitas',
            'imt_normal',
            'td_rendah',
            'td_tinggi',
            'td_normal',
            'gula_darah_rendah',
            'gula_darah_tinggi',
            'remaja_putri_anemia',
            'tidak_anemia',
            'risiko_tbc',
            'masalah_kesehatan'
        ]);
    }

    public function headings(): array
    {
        return [
            'Tanggal Pelaksanaan',
            'Kunjungan Anak Remaja',
            'IMT Kurus',
            'IMT Gemuk',
            'IMT Obesitas',
            'IMT Normal',
            'TD Rendah',
            'TD Tinggi',
            'TD Normal',
            'Gula Darah Rendah',
            'Gula Darah Tinggi',
            'Remaja Putri Anemia',
            'Tidak Anemia',
            'Risiko TBC',
            'Masalah Kesehatan'
        ];
    }
}
