<?php

namespace App\Http\Controllers;

use App\Models\BulananAnakDanRemaja;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;


class BulananAnakDanRemajaController extends Controller
{
    public function index()
    {
        $bulananAnakDanRemajas = BulananAnakDanRemaja::where('user_id', Auth::id())->get();
        // Ambil data grafik per bulan
        $dataPerBulan = BulananAnakDanRemaja::where('user_id', Auth::id())
            ->selectRaw('
                MONTH(tanggal_pelaksanaan) as month, 
                YEAR(tanggal_pelaksanaan) as year,
                SUM(kunjungan_anak_remaja) as total_kunjungan_anak_remaja,
                SUM(imt_kurus) as total_imt_kurus,
                SUM(imt_gemuk) as total_imt_gemuk,
                SUM(imt_obesitas) as total_imt_obesitas,
                SUM(imt_normal) as total_imt_normal,
                SUM(td_rendah) as total_td_rendah,
                SUM(td_tinggi) as total_td_tinggi,
                SUM(td_normal) as total_td_normal,
                SUM(gula_darah_rendah) as total_gula_darah_rendah,
                SUM(gula_darah_tinggi) as total_gula_darah_tinggi,
                SUM(remaja_putri_anemia) as total_remaja_putri_anemia,
                SUM(tidak_anemia) as total_tidak_anemia,
                SUM(risiko_tbc) as total_risiko_tbc,
                SUM(masalah_kesehatan) as total_masalah_kesehatan
            ')
            ->groupBy('month', 'year')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        // Create arrays for chart labels and data
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $kunjunganAnakRemajaData = array_fill(0, 12, 0);
        $imtKurusData = array_fill(0, 12, 0);
        $imtGemukData = array_fill(0, 12, 0);
        $imtObesitasData = array_fill(0, 12, 0);
        $imtNormalData = array_fill(0, 12, 0);
        $tdRendahData = array_fill(0, 12, 0);
        $tdTinggiData = array_fill(0, 12, 0);
        $tdNormalData = array_fill(0, 12, 0);
        $gulaDarahRendahData = array_fill(0, 12, 0);
        $gulaDarahTinggiData = array_fill(0, 12, 0);
        $remajaPutriAnemiaData = array_fill(0, 12, 0);
        $tidakAnemiaData = array_fill(0, 12, 0);
        $risikoTbcData = array_fill(0, 12, 0);
        $masalahKesehatanData = array_fill(0, 12, 0);

        foreach ($dataPerBulan as $data) {
            $index = $data->month - 1;
            $kunjunganAnakRemajaData[$index] = $data->total_kunjungan_anak_remaja;
            $imtKurusData[$index] = $data->total_imt_kurus;
            $imtGemukData[$index] = $data->total_imt_gemuk;
            $imtObesitasData[$index] = $data->total_imt_obesitas;
            $imtNormalData[$index] = $data->total_imt_normal;
            $tdRendahData[$index] = $data->total_td_rendah;
            $tdTinggiData[$index] = $data->total_td_tinggi;
            $tdNormalData[$index] = $data->total_td_normal;
            $gulaDarahRendahData[$index] = $data->total_gula_darah_rendah;
            $gulaDarahTinggiData[$index] = $data->total_gula_darah_tinggi;
            $remajaPutriAnemiaData[$index] = $data->total_remaja_putri_anemia;
            $tidakAnemiaData[$index] = $data->total_tidak_anemia;
            $risikoTbcData[$index] = $data->total_risiko_tbc;
            $masalahKesehatanData[$index] = $data->total_masalah_kesehatan;
        }

        return view('pageadmin.bulanan_anak_dan_remaja.index', compact(
            'months', 
            'kunjunganAnakRemajaData', 
            'imtKurusData', 
            'imtGemukData', 
            'imtObesitasData', 
            'imtNormalData', 
            'tdRendahData', 
            'tdTinggiData', 
            'tdNormalData', 
            'gulaDarahRendahData', 
            'gulaDarahTinggiData', 
            'remajaPutriAnemiaData', 
            'tidakAnemiaData', 
            'tidakAnemiaData', 
            'risikoTbcData', 
            'masalahKesehatanData',
            'bulananAnakDanRemajas'
        ));
    }

    public function store(Request $request)
    {
        // Validate and store the data
        $request->validate([
            'tanggal_pelaksanaan' => 'required|date',
            'kunjungan_anak_remaja' => 'required|integer',
            'imt_kurus' => 'required|integer',
            'imt_gemuk' => 'required|integer',
            'imt_obesitas' => 'required|integer',
            'imt_normal' => 'required|integer',
            'td_rendah' => 'required|integer',
            'td_tinggi' => 'required|integer',
            'td_normal' => 'required|integer',
            'gula_darah_rendah' => 'required|integer',
            'gula_darah_tinggi' => 'required|integer',
            'remaja_putri_anemia' => 'required|integer',
            'tidak_anemia' => 'required|integer',
            'risiko_tbc' => 'required|integer',
            'masalah_kesehatan' => 'required|integer',
        ]);

        BulananAnakDanRemaja::create([
            'user_id' => Auth::id(),
            'tanggal_pelaksanaan' => $request->tanggal_pelaksanaan,
            'kunjungan_anak_remaja' => $request->kunjungan_anak_remaja,
            'imt_kurus' => $request->imt_kurus,
            'imt_gemuk' => $request->imt_gemuk,
            'imt_obesitas' => $request->imt_obesitas,
            'imt_normal' => $request->imt_normal,
            'td_rendah' => $request->td_rendah,
            'td_tinggi' => $request->td_tinggi,
            'td_normal' => $request->td_normal,
            'gula_darah_rendah' => $request->gula_darah_rendah,
            'gula_darah_tinggi' => $request->gula_darah_tinggi,
            'remaja_putri_anemia' => $request->remaja_putri_anemia,
            'tidak_anemia' => $request->tidak_anemia,
            'risiko_tbc' => $request->risiko_tbc,
            'masalah_kesehatan' => $request->masalah_kesehatan,
        ]);

        Alert::success('Success', 'Data berhasil disimpan');
        return redirect()->route('bulanan_anak_dan_remaja.index');
    }
    public function update(Request $request, $id)
    {
        // Find the specific BulananAnakDanRemaja record by ID
        $anakDanRemaja = BulananAnakDanRemaja::findOrFail($id);

        // Validate the incoming request data
        $request->validate([
            'tanggal_pelaksanaan' => 'required|date',
            'kunjungan_anak_remaja' => 'required|integer',
            'imt_kurus' => 'required|integer',
            'imt_gemuk' => 'required|integer',
            'imt_obesitas' => 'required|integer',
            'imt_normal' => 'required|integer',
            'td_rendah' => 'required|integer',
            'td_tinggi' => 'required|integer',
            'td_normal' => 'required|integer',
            'gula_darah_rendah' => 'required|integer',
            'gula_darah_tinggi' => 'required|integer',
            'remaja_putri_anemia' => 'required|integer',
            'tidak_anemia' => 'required|integer',
            'risiko_tbc' => 'required|integer',
            'masalah_kesehatan' => 'nullable|string',
        ]);

        // Update the record with the new data
        $anakDanRemaja->update($request->all());

        // Redirect back to the previous page with a success message
        Alert::success('Success', 'Data updated successfully!');
        return redirect()->back();
    }
}
