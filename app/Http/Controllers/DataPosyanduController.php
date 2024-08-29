<?php

namespace App\Http\Controllers;

use App\Models\DataPosyandu;
use App\Models\RegPosyandu;
use App\Models\Kelurahan;
use App\Models\DataKader;
use App\Models\DataSasaran;
use App\Models\MasterPeralatanKes;
use App\Models\MasterPerbekalanKes;
use App\Models\MasterInstrumen;
use App\Models\Kecamatan;
use App\Models\DataPeralatanKes;
use App\Models\DataPerbekalanKes;
use App\Models\DataInstrumenKes;
use App\Models\MasterStrataPosyandu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataPosyanduController extends Controller
{
    


    public function index()
{
    $dataSasaran = DataSasaran::where('user_id', Auth::id())->first();
    $kaders = DataKader::where('user_id', Auth::id())->get();
    $dataPosyandu = DataPosyandu::where('user_id', Auth::id())->first();
    $strataPosyandu = MasterStrataPosyandu::all();
    $regPosyandu = RegPosyandu::where('user_id', Auth::id())->first();
    $peralatan = MasterPeralatanKes::all();

    // PERALATAN KES SHOW
    $user_id = auth()->user()->id;

    $dataPeralatanKes = DataPeralatanKes::where('user_id', $user_id)->first();
    $peralatan = MasterPeralatanKes::all();

    $peralatanData = [];
    if ($dataPeralatanKes) {
        $peralatanData = collect($dataPeralatanKes->peralatan)->keyBy('peralatan_id')->toArray();
    }
    // PERALATAN KES SHOW

    // PERBEKALAN KES SHOW
    $user_id = auth()->user()->id;

    $dataPerbekalanKes = DataPerbekalanKes::where('user_id', $user_id)->first();
    $perbekalan = MasterPerbekalanKes::all();

    $perbekalanData = [];
    if ($dataPerbekalanKes) {
        $perbekalanData = collect($dataPerbekalanKes->perbekalan)->keyBy('perbekalan_id')->toArray();
    }
    // PERBEKALAN KES SHOW

    // INSTRUMEN KES SHOW
    $user_id = auth()->user()->id;

    $dataInstrumenKes = DataInstrumenKes::where('user_id', $user_id)->first();
    $instrumen = MasterInstrumen::all();

    $instrumenData = [];
    if ($dataInstrumenKes) {
        $instrumenData = collect($dataInstrumenKes->instrumen)->keyBy('instrumen_id')->toArray();
    }
    // INSTRUMEN KES SHOW
    
    // Mendapatkan kecamatan dan kelurahan terkait
    $kecamatan = $regPosyandu->kecamatan->name ?? '';
    $kelurahan = $regPosyandu->kelurahan->name ?? '';

    return view('pageadmin.data_posyandu.index', compact('dataPosyandu', 'strataPosyandu', 'regPosyandu', 'kecamatan', 'kelurahan','kaders','dataSasaran','peralatan','peralatanData','perbekalan','perbekalanData','instrumen','instrumenData'));
}



    public function storeOrUpdateDataPosyandu(Request $request, DataPosyandu $dataPosyandu = null)
    {
        $validated = $request->validate([
            'strata_posyandu' => 'required|string',
            'tempat_kegiatan' => 'required|string',
            'keterangan' => 'nullable|string',
            'sk_kelurahan' => 'nullable|file|mimes:pdf,jpg,png',
            'foto_lokasi' => 'nullable|file|mimes:jpg,png',
        ]);

        $data = [
            'strata_posyandu' => $validated['strata_posyandu'],
            'tempat_kegiatan' => $validated['tempat_kegiatan'],
            'keterangan' => $validated['keterangan'] ?? '',
            'user_id' => Auth::id(),
        ];

        if ($request->hasFile('sk_kelurahan')) {
            $file = $request->file('sk_kelurahan');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move('uploads/sk_kelurahan', $filename);
            $data['sk_kelurahan'] = 'uploads/sk_kelurahan/' . $filename;
        }
        
        if ($request->hasFile('foto_lokasi')) {
            $file = $request->file('foto_lokasi');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move('uploads/foto_lokasi', $filename);
            $data['foto_lokasi'] = 'uploads/foto_lokasi/' . $filename;
        }
        
        if ($dataPosyandu) {
            $dataPosyandu->update($data);
            $message = 'Data updated successfully!';
        } else {
            DataPosyandu::create($data);
            $message = 'Data created successfully!';
        }

        return redirect()->route('dataposyandu.index')->with('success', $message);
    }

   
}
