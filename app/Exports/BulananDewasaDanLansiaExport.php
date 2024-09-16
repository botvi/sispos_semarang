<?php

namespace App\Exports;

use App\Models\BulananDewasaDanLansia;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BulananDewasaDanLansiaExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Mengambil data bulanan dewasa dan lansia berdasarkan user yang sedang login
        $userId = Auth::id();
        return BulananDewasaDanLansia::where('user_id', $userId)->get([
            'tanggal_pelaksanaan',
            'jumlah_usia_dewasa_risiko_ppok',
            'jumlah_usia_dewasa_gangguan_jiwa',
            'jumlah_lansia_skrining_skl',
            'jumlah_lansia_dirujuk_puskesmas',
            'jumlah_akseptor_kb'
        ]);
    }

    public function headings(): array
    {
        return [
            'Tanggal Pelaksanaan',
            'Jumlah Usia Dewasa Risiko PPOK',
            'Jumlah Usia Dewasa Gangguan Jiwa',
            'Jumlah Lansia Skrining SKL',
            'Jumlah Lansia Dirujuk Puskesmas',
            'Jumlah Akseptor KB'
        ];
    }
}
