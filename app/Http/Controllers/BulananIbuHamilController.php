<?php

namespace App\Http\Controllers;

use App\Models\BulananIbuHamil;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class BulananIbuHamilController extends Controller
{
    public function index()
    {
        $bulananIbuHamil = BulananIbuHamil::where('user_id', Auth::id())->get();
        // Ambil data grafik per bulan
        $dataPerBulan = BulananIbuHamil::where('user_id', Auth::id())
            ->selectRaw('
                MONTH(tanggal_pelaksanaan) as month, 
                YEAR(tanggal_pelaksanaan) as year,
                SUM(jumlah_ibu_hamil_nifas_menyusui) as total_nifas_menyusui,
                SUM(jumlah_ibu_hamil_bb_garis_merah) as total_bb_garis_merah,
                SUM(jumlah_ibu_hamil_lila) as total_lila,
                SUM(jumlah_ibu_hamil_risiko_tbc) as total_risiko_tbc,
                SUM(jumlah_ibu_hamil_mendapat_ttd) as total_mendapat_ttd,
                SUM(jumlah_ibu_hamil_makanan_tambahan_kek) as total_makanan_tambahan_kek,
                SUM(jumlah_ibu_hamil_ikut_kelas) as total_ikut_kelas,
                SUM(jumlah_ibu_hamil_dirujuk_ke_puskesmas) as total_dirujuk_ke_puskesmas
            ')
            ->groupBy('month', 'year')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        // Create arrays for chart labels and data
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $nifasMenyusuiData = array_fill(0, 12, 0);
        $bbGarisMerahData = array_fill(0, 12, 0);
        $lilaData = array_fill(0, 12, 0);
        $risikoTbcData = array_fill(0, 12, 0);
        $mendapatTtdData = array_fill(0, 12, 0);
        $makananTambahanKekData = array_fill(0, 12, 0);
        $ikutKelasData = array_fill(0, 12, 0);
        $dirujukKePuskesmasData = array_fill(0, 12, 0);

        foreach ($dataPerBulan as $data) {
            $index = $data->month - 1;
            $nifasMenyusuiData[$index] = $data->total_nifas_menyusui;
            $bbGarisMerahData[$index] = $data->total_bb_garis_merah;
            $lilaData[$index] = $data->total_lila;
            $risikoTbcData[$index] = $data->total_risiko_tbc;
            $mendapatTtdData[$index] = $data->total_mendapat_ttd;
            $makananTambahanKekData[$index] = $data->total_makanan_tambahan_kek;
            $ikutKelasData[$index] = $data->total_ikut_kelas;
            $dirujukKePuskesmasData[$index] = $data->total_dirujuk_ke_puskesmas;
        }

        return view('pageadmin.bulanan_ibu_hamil.index', compact(
            'months', 
            'nifasMenyusuiData', 
            'bbGarisMerahData', 
            'lilaData', 
            'risikoTbcData', 
            'mendapatTtdData', 
            'makananTambahanKekData', 
            'ikutKelasData', 
            'dirujukKePuskesmasData',
            'bulananIbuHamil'
        ));
    }

    public function store(Request $request)
    {
        // Validate and store the data
        $request->validate([
            'tanggal_pelaksanaan' => 'required|date',
            'jumlah_ibu_hamil_nifas_menyusui' => 'required|integer',
            'jumlah_ibu_hamil_bb_garis_merah' => 'required|integer',
            'jumlah_ibu_hamil_lila' => 'required|integer',
            'jumlah_ibu_hamil_risiko_tbc' => 'required|integer',
            'jumlah_ibu_hamil_mendapat_ttd' => 'required|integer',
            'jumlah_ibu_hamil_makanan_tambahan_kek' => 'required|integer',
            'jumlah_ibu_hamil_ikut_kelas' => 'required|integer',
            'jumlah_ibu_hamil_dirujuk_ke_puskesmas' => 'required|integer',
        ]);

        BulananIbuHamil::create([
            'user_id' => Auth::id(),
            'tanggal_pelaksanaan' => $request->tanggal_pelaksanaan,
            'jumlah_ibu_hamil_nifas_menyusui' => $request->jumlah_ibu_hamil_nifas_menyusui,
            'jumlah_ibu_hamil_bb_garis_merah' => $request->jumlah_ibu_hamil_bb_garis_merah,
            'jumlah_ibu_hamil_lila' => $request->jumlah_ibu_hamil_lila,
            'jumlah_ibu_hamil_risiko_tbc' => $request->jumlah_ibu_hamil_risiko_tbc,
            'jumlah_ibu_hamil_mendapat_ttd' => $request->jumlah_ibu_hamil_mendapat_ttd,
            'jumlah_ibu_hamil_makanan_tambahan_kek' => $request->jumlah_ibu_hamil_makanan_tambahan_kek,
            'jumlah_ibu_hamil_ikut_kelas' => $request->jumlah_ibu_hamil_ikut_kelas,
            'jumlah_ibu_hamil_dirujuk_ke_puskesmas' => $request->jumlah_ibu_hamil_dirujuk_ke_puskesmas,
        ]);

        Alert::success('Success', 'Data berhasil disimpan');
        return redirect()->route('bulanan_ibu_hamil.index');
    }
    public function update(Request $request, $id)
    {
        // Find the specific record by ID
        $ibuHamil = BulananIbuHamil::findOrFail($id);

        // Validate the incoming request data
        $request->validate([
            'tanggal_pelaksanaan' => 'required|date',
            'jumlah_ibu_hamil_nifas_menyusui' => 'required|integer',
            'jumlah_ibu_hamil_bb_garis_merah' => 'required|integer',
            'jumlah_ibu_hamil_lila' => 'required|integer',
            'jumlah_ibu_hamil_risiko_tbc' => 'required|integer',
            'jumlah_ibu_hamil_mendapat_ttd' => 'required|integer',
            'jumlah_ibu_hamil_makanan_tambahan_kek' => 'required|integer',
            'jumlah_ibu_hamil_ikut_kelas' => 'required|integer',
            'jumlah_ibu_hamil_dirujuk_ke_puskesmas' => 'required|integer',
        ]);

        // Update the record with the new data
        $ibuHamil->update($request->all());

        // Redirect back to the previous page with a success message
        Alert::success('Success', 'Data updated successfully!');
        return redirect()->back();
    }
}
