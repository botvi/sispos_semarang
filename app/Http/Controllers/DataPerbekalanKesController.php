<?php

namespace App\Http\Controllers;

use App\Models\DataPerbekalanKes;
use App\Models\MasterPerbekalanKes;
use Illuminate\Http\Request;

class DataPerbekalanKesController extends Controller
{
        // VIEW NYA ADA DI DATA POSYANDU CONTROLLER

    public function storeOrUpdate(Request $request)
    {
        $user_id = $request->input('user_id');
        $perbekalanData = $request->input('perbekalan');

        // Ambil data perbekalan dari request
        $perbekalan = [];
        foreach ($perbekalanData as $perbekalan_id => $jumlah) {
            if ($jumlah > 0) {
                $perbekalan[] = [
                    'perbekalan_id' => $perbekalan_id,
                    'jumlah' => $jumlah,
                ];
            }
        }

        // Cek apakah data sudah ada untuk user ini
        $dataPerbekalanKes = DataPerbekalanKes::where('user_id', $user_id)->first();

        if ($dataPerbekalanKes) {
            // Update data jika sudah ada
            $dataPerbekalanKes->update(['perbekalan' => $perbekalan]);
        } else {
            // Simpan data baru
            DataPerbekalanKes::create([
                'user_id' => $user_id,
                'perbekalan' => $perbekalan,
            ]);
        }

        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }
}
