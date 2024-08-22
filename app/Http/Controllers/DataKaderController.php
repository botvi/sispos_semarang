<?php

namespace App\Http\Controllers;

use App\Models\DataKader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DataKaderController extends Controller
{

    // VIEW NYA ADA DI DATA POSYANDU CONTROLLER
    
    // public function index()
    // {
    //     $kaders = DataKader::where('user_id', Auth::id())->get();
    //     return view('pageadmin.data_posyandu.index', compact('kaders'));
    // }

    public function create()
    {
        return view('pageadmin.data_posyandu.tambahkader');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'jabatan' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
            'pertama_kali' => 'required|date',
            'pelatihan_diikuti' => 'required|string|max:255',
            'sertifikat' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
        ]);

        $sertifikatPath = null;
        if ($request->hasFile('sertifikat')) {
            $sertifikatPath = $request->file('sertifikat')->move('uploads/sertifkader', time() . '_' . $request->file('sertifikat')->getClientOriginalName());
        }

        DataKader::create([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'jabatan' => $request->jabatan,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pertama_kali' => $request->pertama_kali,
            'pelatihan_diikuti' => $request->pelatihan_diikuti,
            'sertifikat' => $sertifikatPath,
            'user_id' => Auth::id(),
        ]);

        Alert::success('Sukses', 'Data Kader berhasil ditambahkan.');
        return redirect()->route('dataposyandu.index');
    }

    public function edit($id)
    {
        $dataKader = DataKader::findOrFail($id);
        return view('pageadmin.data_posyandu.editkader', compact('dataKader'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'jabatan' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
            'pertama_kali' => 'required|date',
            'pelatihan_diikuti' => 'required|string|max:255',
            'sertifikat' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
        ]);

        $dataKader = DataKader::findOrFail($id);
        $dataKader->nama = $request->nama;
        $dataKader->no_hp = $request->no_hp;
        $dataKader->jabatan = $request->jabatan;
        $dataKader->tempat_lahir = $request->tempat_lahir;
        $dataKader->tanggal_lahir = $request->tanggal_lahir;
        $dataKader->jenis_kelamin = $request->jenis_kelamin;
        $dataKader->pertama_kali = $request->pertama_kali;
        $dataKader->pelatihan_diikuti = $request->pelatihan_diikuti;

        if ($request->hasFile('sertifikat')) {
            // Delete old file if exists
            if ($dataKader->sertifikat && file_exists(public_path($dataKader->sertifikat))) {
                unlink(public_path($dataKader->sertifikat));
            }
            $sertifikatPath = $request->file('sertifikat')->move('uploads/sertifkader', time() . '_' . $request->file('sertifikat')->getClientOriginalName());
            $dataKader->sertifikat = $sertifikatPath;
        }

        $dataKader->save();

        Alert::success('Sukses', 'Data Kader berhasil diperbarui.');
        return redirect()->route('dataposyandu.index');
    }

    public function destroy($id)
    {
        $dataKader = DataKader::findOrFail($id);

        // Delete the associated file if it exists
        if ($dataKader->sertifikat && file_exists(public_path($dataKader->sertifikat))) {
            unlink(public_path($dataKader->sertifikat));
        }

        $dataKader->delete();

        Alert::success('Sukses', 'Data Kader berhasil dihapus.');
        return redirect()->route('dataposyandu.index');
    }
}
