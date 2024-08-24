<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MasterPuskesmas;
use App\Models\DataPosyandu;
use App\Models\RegPosyandu;
use App\Models\DataInstrumenKes;
use App\Models\DataKader;
use App\Models\DataSasaran;
use App\Models\DataPeralatanKes;
use App\Models\DataPerbekalanKes;
use App\Models\MasterPeralatanKes;
use App\Models\MasterPerbekalanKes;
use App\Models\MasterInstrumen;

class ListPosyanduController extends Controller
{
    public function index()
    {
        // Mendapatkan ID pengguna yang sedang login
        $userId = Auth::id();

        // Mendapatkan data MasterPuskesmas berdasarkan user_id yang login
        $puskesmas = MasterPuskesmas::where('user_id', $userId)->first();

        // Jika data puskesmas ditemukan
        if ($puskesmas) {
            // Mendapatkan data RegPosyandu berdasarkan puskesmas_id dan status diterima, beserta data kecamatan dan kelurahan
            $posyandus = RegPosyandu::with(['kecamatan', 'kelurahan', 'puskesmas'])
                                    ->where('puskesmas_id', $puskesmas->id)
                                    ->where('status', 'diterima')
                                    ->get();
        } else {
            // Jika tidak ditemukan, set data posyandus sebagai koleksi kosong
            $posyandus = collect();
        }

        return view('pageadmin.auth_puskes_daftarpos.index', compact('posyandus'));
    }

    public function show($user_id)
{
    // Ambil data dari model RegPosyandu berdasarkan user_id
    $regPosyandu = RegPosyandu::where('user_id', $user_id)->first();

    // Ambil data dari model DataPosyandu berdasarkan user_id
    $dataPosyandu = DataPosyandu::where('user_id', $user_id)->first();

    // Ambil data dari model DataKader, DataPeralatanKes, DataPerbekalanKes, DataInstrumenKes, dan DataSasaran berdasarkan user_id
    $dataKader = DataKader::where('user_id', $user_id)->get();
    $dataPeralatanKes = DataPeralatanKes::where('user_id', $user_id)->first();
    $dataPerbekalanKes = DataPerbekalanKes::where('user_id', $user_id)->first();
    $dataInstrumenKes = DataInstrumenKes::where('user_id', $user_id)->first();
    $dataSasaran = DataSasaran::where('user_id', $user_id)->first();

    // Ambil data master untuk peralatan, perbekalan, dan instrumen
    $masterPeralatan = MasterPeralatanKes::all()->keyBy('id');
    $masterPerbekalan = MasterPerbekalanKes::all()->keyBy('id');
    $masterInstrumen = MasterInstrumen::all()->keyBy('id');

    // Pastikan data ditemukan
    if (!$regPosyandu || !$dataPosyandu) {
        return redirect()->back()->with('error', 'Data tidak ditemukan.');
    }

    // Return ke view detail dengan data yang ditemukan
    return view('pageadmin.auth_puskes_daftarpos.detail', compact(
        'regPosyandu', 
        'dataPosyandu', 
        'dataKader', 
        'dataPeralatanKes', 
        'dataPerbekalanKes', 
        'dataInstrumenKes', 
        'dataSasaran',
        'masterPeralatan', 
        'masterPerbekalan', 
        'masterInstrumen'
    ));
}



}
