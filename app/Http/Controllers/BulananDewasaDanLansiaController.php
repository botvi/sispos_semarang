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
        $bulananDewasaDanLansias = BulananDewasaDanLansia::where('user_id', Auth::id())->get();

        // Ambil data grafik per bulan
        $dataPerBulan = BulananDewasaDanLansia::where('user_id', Auth::id())
            ->selectRaw('
                MONTH(tanggal_pelaksanaan) as month, 
                YEAR(tanggal_pelaksanaan) as year,
                SUM(jumlah_usia_dewasa_risiko_ppok) as total_risiko_ppok,
                SUM(jumlah_usia_dewasa_gangguan_jiwa) as total_gangguan_jiwa,
                SUM(jumlah_lansia_skrining_skl) as total_skrining_skl,
                SUM(jumlah_lansia_dirujuk_puskesmas) as total_dirujuk_puskesmas,
                SUM(jumlah_akseptor_kb) as total_akseptor_kb
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
        $akseptorKb = array_fill(0, 12, 0);

        foreach ($dataPerBulan as $data) {
            $index = $data->month - 1;
            $risikoPpokData[$index] = $data->total_risiko_ppok;
            $gangguanJiwaData[$index] = $data->total_gangguan_jiwa;
            $skriningSklData[$index] = $data->total_skrining_skl;
            $dirujukPuskesmasData[$index] = $data->total_dirujuk_puskesmas;
            $akseptorKb[$index] = $data->total_akseptor_kb;
        }

        return view('pageadmin.bulanan_dewasa_dan_lansia.index', compact(
            'months', 
            'risikoPpokData', 
            'gangguanJiwaData', 
            'skriningSklData', 
            'dirujukPuskesmasData',
            'akseptorKb',
            'bulananDewasaDanLansias'
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
            'jumlah_akseptor_kb' => 'required|integer',
        ]);

        BulananDewasaDanLansia::create([
            'user_id' => Auth::id(),
            'tanggal_pelaksanaan' => $request->tanggal_pelaksanaan,
            'jumlah_usia_dewasa_risiko_ppok' => $request->jumlah_usia_dewasa_risiko_ppok,
            'jumlah_usia_dewasa_gangguan_jiwa' => $request->jumlah_usia_dewasa_gangguan_jiwa,
            'jumlah_lansia_skrining_skl' => $request->jumlah_lansia_skrining_skl,
            'jumlah_lansia_dirujuk_puskesmas' => $request->jumlah_lansia_dirujuk_puskesmas,
            'jumlah_akseptor_kb' => $request->jumlah_akseptor_kb,
        ]);

        Alert::success('Success', 'Data berhasil disimpan');
        return redirect()->route('bulanan_dewasa_dan_lansia.index');
    }
    public function update(Request $request, $id)
    {
        $dewasaDanLansia = BulananDewasaDanLansia::findOrFail($id);

        $request->validate([
            'tanggal_pelaksanaan' => 'required|date',
            'jumlah_usia_dewasa_risiko_ppok' => 'required|integer',
            'jumlah_usia_dewasa_gangguan_jiwa' => 'required|integer',
            'jumlah_lansia_skrining_skl' => 'required|integer',
            'jumlah_lansia_dirujuk_puskesmas' => 'required|integer',
            'jumlah_akseptor_kb' => 'required|integer',
        ]);

        $dewasaDanLansia->update($request->all());

        Alert::success('Success', 'Data updated successfully!');
        return redirect()->back();
    }
}
