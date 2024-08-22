<?php

namespace App\Http\Controllers;

use App\Models\DataInstrumenKes;
use App\Models\MasterInstrumenKes;
use Illuminate\Http\Request;

class DataInstrumenKesController extends Controller
{
    public function storeOrUpdate(Request $request)
    {
            // VIEW NYA ADA DI DATA POSYANDU CONTROLLER

        $user_id = $request->input('user_id');
        $instrumenData = $request->input('instrumen');

        // Ambil data instrumen dari request
        $instrumen = [];
        foreach ($instrumenData as $instrumen_id => $jumlah) {
            if ($jumlah > 0) {
                $instrumen[] = [
                    'instrumen_id' => $instrumen_id,
                    'jumlah' => $jumlah,
                ];
            }
        }

        // Cek apakah data sudah ada untuk user ini
        $dataInstrumenKes = DataInstrumenKes::where('user_id', $user_id)->first();

        if ($dataInstrumenKes) {
            // Update data jika sudah ada
            $dataInstrumenKes->update(['instrumen' => $instrumen]);
        } else {
            // Simpan data baru
            DataInstrumenKes::create([
                'user_id' => $user_id,
                'instrumen' => $instrumen,
            ]);
        }

        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }
}
