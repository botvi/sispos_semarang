<?php

namespace App\Http\Controllers;

use App\Models\BulananBalita;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class BulananBalitaController extends Controller
{
    public function index()
    {

        // Ambil data grafik per bulan
        $dataPerBulan = BulananBalita::where('user_id', Auth::id())
            ->selectRaw('
                MONTH(tanggal_pelaksanaan) as month, 
                YEAR(tanggal_pelaksanaan) as year,
                SUM(jumlah_sasaran_balita) as total_sasaran,
                SUM(jumlah_balita_kms) as total_kms,
                SUM(jumlah_balita_datang) as total_datang,
                SUM(jumlah_balita_naik_timbangan) as total_naik_timbangan
            ')
            ->groupBy('month', 'year')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        // Create arrays for chart labels and data
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $sasaranData = array_fill(0, 12, 0);
        $kmsData = array_fill(0, 12, 0);
        $datangData = array_fill(0, 12, 0);
        $naikTimbanganData = array_fill(0, 12, 0);

        foreach ($dataPerBulan as $data) {
            $index = $data->month - 1;
            $sasaranData[$index] = $data->total_sasaran;
            $kmsData[$index] = $data->total_kms;
            $datangData[$index] = $data->total_datang;
            $naikTimbanganData[$index] = $data->total_naik_timbangan;
        }

        return view('pageadmin.bulanan_balita.index', compact( 'months', 'sasaranData', 'kmsData', 'datangData', 'naikTimbanganData'));
    }



    public function store(Request $request)
{
    $validatedData = $request->validate([
        'tanggal_pelaksanaan' => 'required|date',
        'jumlah_sasaran_balita' => 'required|integer',
        'jumlah_balita_kms' => 'nullable|integer',
        'jumlah_balita_datang' => 'nullable|integer',
        'jumlah_balita_naik_timbangan' => 'nullable|integer',
        'jumlah_balita_turun_timbangan' => 'nullable|integer',
        'jumlah_balita_bgm' => 'nullable|integer',
        'jumlah_balita_sakit' => 'nullable|integer',
        'jumlah_balita_vitamin_feb' => 'nullable|integer',
        'jumlah_balita_vitamin_aug' => 'nullable|integer',
        'jumlah_balita_dirujuk' => 'nullable|integer',
    ]);

    // Buat entri baru setiap kali data disimpan
    BulananBalita::create($validatedData + ['user_id' => Auth::id()]);

    Alert::success('Success', 'Data has been saved successfully!');
    return redirect()->back();
}

}
