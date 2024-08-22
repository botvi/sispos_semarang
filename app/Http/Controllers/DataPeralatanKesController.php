<?php

namespace App\Http\Controllers;

use App\Models\DataPeralatanKes;
use App\Models\MasterPeralatanKes;
use Illuminate\Http\Request;

class DataPeralatanKesController extends Controller
{
        // VIEW NYA ADA DI DATA POSYANDU CONTROLLER

    public function storeOrUpdate(Request $request)
    {
        $user_id = $request->input('user_id');
        $peralatanData = $request->input('peralatan');

        // Ambil data peralatan dari request
        $peralatan = [];
        foreach ($peralatanData as $peralatan_id => $jumlah) {
            if ($jumlah > 0) {
                $peralatan[] = [
                    'peralatan_id' => $peralatan_id,
                    'jumlah' => $jumlah,
                ];
            }
        }

        // Cek apakah data sudah ada untuk user ini
        $dataPeralatanKes = DataPeralatanKes::where('user_id', $user_id)->first();

        if ($dataPeralatanKes) {
            // Update data jika sudah ada
            $dataPeralatanKes->update(['peralatan' => $peralatan]);
        } else {
            // Simpan data baru
            DataPeralatanKes::create([
                'user_id' => $user_id,
                'peralatan' => $peralatan,
            ]);
        }

        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }
}
