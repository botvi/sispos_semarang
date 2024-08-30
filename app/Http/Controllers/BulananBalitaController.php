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

            // Tambah tampilan persentase D/S X 100
            // Tambah tampilan persentase N/S X 100
        $bulananBalitas = BulananBalita::where('user_id', Auth::id())->get();

        $userId = Auth::id();

        $data = BulananBalita::where('user_id', $userId)
            ->selectRaw('
                SUM(jumlah_sasaran_balita) as total_sasaran_balita,
                SUM(jumlah_balita_datang) as total_balita_datang,
                SUM(jumlah_balita_naik_timbangan) as total_balita_naik_timbangan
            ')
            ->first();
    
        $persentaseDatang = 0;
        $persentaseNaikTimbangan = 0;
    
        if ($data->total_sasaran_balita > 0) {
            $persentaseDatang = ($data->total_balita_datang / $data->total_sasaran_balita) * 100;
            $persentaseNaikTimbangan = ($data->total_balita_naik_timbangan / $data->total_sasaran_balita) * 100;
        }
            // Tambah tampilan persentase D/S X 100
            // Tambah tampilan persentase N/S X 100
    

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

        return view('pageadmin.bulanan_balita.index', compact( 'months', 'sasaranData', 'kmsData', 'datangData', 'naikTimbanganData','bulananBalitas','persentaseDatang', 'persentaseNaikTimbangan'));
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
public function update(Request $request, $id)
    {
        // Find the specific BulananBalita record by ID
        $balita = BulananBalita::findOrFail($id);

        // Validate the incoming request data
        $request->validate([
            'tanggal_pelaksanaan' => 'required|date',
            'jumlah_sasaran_balita' => 'required|integer',
            'jumlah_balita_kms' => 'required|integer',
            'jumlah_balita_datang' => 'required|integer',
            'jumlah_balita_naik_timbangan' => 'required|integer',
            'jumlah_balita_turun_timbangan' => 'required|integer',
            'jumlah_balita_bgm' => 'required|integer',
            'jumlah_balita_sakit' => 'required|integer',
            'jumlah_balita_vitamin_feb' => 'required|integer',
            'jumlah_balita_vitamin_aug' => 'required|integer',
            'jumlah_balita_dirujuk' => 'required|integer',
        ]);

        // Update the record with the new data
        $balita->update($request->all());

        // Redirect back to the previous page with a success message
        Alert::success('Success', 'Data updated successfully!');
    return redirect()->back();
    }

}
