<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterPuskesmas;
use App\Models\RegPosyandu;
use App\Models\DataPosyandu;
use App\Models\DataInstrumenKes;
use App\Models\DataKader;
use App\Models\DataSasaran;
use App\Models\DataPeralatanKes;
use App\Models\DataPerbekalanKes;
use App\Models\MasterPeralatanKes;
use App\Models\MasterPerbekalanKes;
use App\Models\MasterInstrumen;

class ListPuskesmasController extends Controller
{

    public function index()
    {
        $puskesmas = MasterPuskesmas::all();
        return view('pageadmin.auth_dinkes_daftarpus.index', compact('puskesmas'));
    }

    public function showPosyandu($puskesmas_id)
{
    $posyandus = RegPosyandu::where('puskesmas_id', $puskesmas_id)->get();
    return view('pageadmin.auth_dinkes_daftarpus.posyandus', compact('posyandus'));
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
    return view('pageadmin.auth_dinkes_daftarpus.detailposyandu', compact(
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
