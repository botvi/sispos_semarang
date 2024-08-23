<?php

namespace App\Http\Controllers;

use App\Models\BulananDewasaDanLansia;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class BulananDewasaDanLansiaController extends Controller
{
    public function index()
    {
        // Ambil data grafik per bulan
        $dataPerBulan = BulananDewasaDanLansia::where('user_id', Auth::id())
            ->selectRaw('
                MONTH(tanggal_pelaksanaan) as month, 
                YEAR(tanggal_pelaksanaan) as year,
                SUM(jumlah_usia_dewasa_risiko_ppok) as total_risiko_ppok,
                SUM(jumlah_usia_dewasa_gangguan_jiwa) as total_gangguan_jiwa,
                SUM(jumlah_lansia_skrining_skl) as total_skrining_skl,
                SUM(jumlah_lansia_dirujuk_puskesmas) as total_dirujuk_puskesmas
            ')
            ->groupBy('month', 'year')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        // Create arrays for chart labels and data
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $risikoPpokData = array_fill(0, 12, 0);
        $gangguanJiwaData = array_fill(0, 12, 0);
        $skriningSklData = array_fill(0, 12, 0);
        $dirujukPuskesmasData = array_fill(0, 12, 0);

        foreach ($dataPerBulan as $data) {
            $index = $data->month - 1;
            $risikoPpokData[$index] = $data->total_risiko_ppok;
            $gangguanJiwaData[$index] = $data->total_gangguan_jiwa;
            $skriningSklData[$index] = $data->total_skrining_skl;
            $dirujukPuskesmasData[$index] = $data->total_dirujuk_puskesmas;
        }

        return view('pageadmin.bulanan_dewasa_dan_lansia.index', compact(
            'months', 
            'risikoPpokData', 
            'gangguanJiwaData', 
            'skriningSklData', 
            'dirujukPuskesmasData'
        ));
    }

    public function store(Request $request)
    {
        // Validate and store the data
        $request->validate([
            'tanggal_pelaksanaan' => 'required|date',
            'jumlah_usia_dewasa_risiko_ppok' => 'required|integer',
            'jumlah_usia_dewasa_gangguan_jiwa' => 'required|integer',
            'jumlah_lansia_skrining_skl' => 'required|integer',
            'jumlah_lansia_dirujuk_puskesmas' => 'required|integer',
        ]);

        BulananDewasaDanLansia::create([
            'user_id' => Auth::id(),
            'tanggal_pelaksanaan' => $request->tanggal_pelaksanaan,
            'jumlah_usia_dewasa_risiko_ppok' => $request->jumlah_usia_dewasa_risiko_ppok,
            'jumlah_usia_dewasa_gangguan_jiwa' => $request->jumlah_usia_dewasa_gangguan_jiwa,
            'jumlah_lansia_skrining_skl' => $request->jumlah_lansia_skrining_skl,
            'jumlah_lansia_dirujuk_puskesmas' => $request->jumlah_lansia_dirujuk_puskesmas,
        ]);

        Alert::success('Success', 'Data berhasil disimpan');
        return redirect()->route('bulanan_dewasa_dan_lansia.index');
    }
}
