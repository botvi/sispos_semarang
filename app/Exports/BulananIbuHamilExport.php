<?php

namespace App\Exports;

use App\Models\BulananIbuHamil;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BulananIbuHamilExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Mengambil data ibu hamil berdasarkan user yang sedang login
        $userId = Auth::id();
        return BulananIbuHamil::where('user_id', $userId)->get([
            'tanggal_pelaksanaan',
            'jumlah_ibu_hamil',
            'jumlah_ibu_nifas',
            'jumlah_ibu_menyusui',
            'jumlah_ibu_hamil_bb_garis_merah',
            'jumlah_ibu_hamil_lila',
            'jumlah_ibu_hamil_risiko_tbc',
            'jumlah_ibu_hamil_mendapat_ttd',
            'jumlah_ibu_hamil_makanan_tambahan_kek',
            'jumlah_ibu_hamil_ikut_kelas',
            'jumlah_ibu_hamil_dirujuk_ke_puskesmas'
        ]);
    }

    public function headings(): array
    {
        return [
            'Tanggal Pelaksanaan',
            'Jumlah Ibu Hamil',
            'Jumlah Ibu Nifas',
            'Jumlah Ibu Menyusui',
            'Jumlah Ibu Hamil BB Garis Merah',
            'Jumlah Ibu Hamil LILA',
            'Jumlah Ibu Hamil Risiko TBC',
            'Jumlah Ibu Hamil Mendapat TTD',
            'Jumlah Ibu Hamil Mendapat Makanan Tambahan KEK',
            'Jumlah Ibu Hamil Ikut Kelas Ibu Hamil',
            'Jumlah Ibu Hamil Dirujuk ke Puskesmas'
        ];
    }
}
