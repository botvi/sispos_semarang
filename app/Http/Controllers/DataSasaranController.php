<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSasaran;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DataSasaranController extends Controller
{


    // VIEW NYA ADA DI DATA POSYANDU CONTROLLER


    // public function index()
    // {
    //     $userId = Auth::id();
    //     $dataSasaran = DataSasaran::where('user_id', $userId)->first();

    //     return view('dataSasaran.index', compact('dataSasaran'));
    // }

    public function store(Request $request)
    {
        $userId = Auth::id();

        // Validasi input
        $validated = $request->validate([
            'jumlah_bayi_1' => 'required|numeric',
            'jumlah_bayi_2' => 'required|numeric',
            'jumlah_balita' => 'required|numeric',
            'jumlah_ibu_hamil' => 'required|numeric',
            'jumlah_ibu_nifas_menyusui' => 'required|numeric',
            'jumlah_anak_usia_sekolah' => 'required|numeric',
            'jumlah_usia_dewasa' => 'required|numeric',
            'jumlah_lansia' => 'required|numeric',
        ]);

        // Periksa apakah data sudah ada
        $dataSasaran = DataSasaran::where('user_id', $userId)->first();

        if ($dataSasaran) {
            // Update data jika sudah ada
            $dataSasaran->update($validated);
            $message = 'Data updated successfully!';
        } else {
            // Buat data baru jika belum ada
            $validated['user_id'] = $userId;
            DataSasaran::create($validated);
            $message = 'Data created successfully!';
        }

        // Show SweetAlert message
        Alert::success('Success', $message);

        return redirect()->route('dataposyandu.index');
    }
}
