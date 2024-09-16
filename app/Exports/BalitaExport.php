<?php

namespace App\Exports;

use App\Models\BulananBalita;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BalitaExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Mengambil data balita berdasarkan user yang sedang login
        $userId = Auth::id();
        return BulananBalita::where('user_id', $userId)->get([
            'tanggal_pelaksanaan',
            'jumlah_sasaran_balita',
            'jumlah_balita_kms',
            'jumlah_balita_datang',
            'jumlah_balita_naik_timbangan',
            'jumlah_balita_turun_timbangan',
            'jumlah_balita_bgm',
            'jumlah_balita_sakit',
            'jumlah_balita_vitamin_feb',
            'jumlah_balita_vitamin_aug',
            'jumlah_balita_dirujuk'
        ]);
    }

    /**
     * Menambahkan header ke dalam file Excel
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Tanggal Pelaksanaan',
            'Jumlah Sasaran Balita (S)',
            'Jumlah Balita Mempunyai KMS/Buku KIA (K)',
            'Jumlah Balita Datang (D)',
            'Jumlah Balita Naik Timbangan (N)',
            'Jumlah Balita Turun Timbangan',
            'Jumlah Balita Dibawah Garis Merah (BGM)',
            'Jumlah Balita Sakit',
            'Jumlah Balita Mendapat Vitamin A (Februari)',
            'Jumlah Balita Mendapat Vitamin A (Agustus)',
            'Jumlah Balita Dirujuk'
        ];
    }
}
