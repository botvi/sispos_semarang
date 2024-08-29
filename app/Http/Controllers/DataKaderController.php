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
            'pelatihan_diikuti1' => 'required|string|max:255',
            'sertifikat1' => 'nullable|file|mimes:jpg,png,pdf',
            'pelatihan_diikuti2' => 'required|string|max:255',
            'sertifikat2' => 'nullable|file|mimes:jpg,png,pdf',
            'pelatihan_diikuti3' => 'required|string|max:255',
            'sertifikat3' => 'nullable|file|mimes:jpg,png,pdf',
        ]);

        $sertifikatPath1 = $request->hasFile('sertifikat1')
            ? $request->file('sertifikat1')->move('uploads/sertifkader1', time() . '_' . $request->file('sertifikat1')->getClientOriginalName())
            : null;

        $sertifikatPath2 = $request->hasFile('sertifikat2')
            ? $request->file('sertifikat2')->move('uploads/sertifkader2', time() . '_' . $request->file('sertifikat2')->getClientOriginalName())
            : null;

        $sertifikatPath3 = $request->hasFile('sertifikat3')
            ? $request->file('sertifikat3')->move('uploads/sertifkader3', time() . '_' . $request->file('sertifikat3')->getClientOriginalName())
            : null;

        DataKader::create([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'jabatan' => $request->jabatan,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pertama_kali' => $request->pertama_kali,
            'pelatihan_diikuti1' => $request->pelatihan_diikuti1,
            'sertifikat1' => $sertifikatPath1,
            'pelatihan_diikuti2' => $request->pelatihan_diikuti2,
            'sertifikat2' => $sertifikatPath2,
            'pelatihan_diikuti3' => $request->pelatihan_diikuti3,
            'sertifikat3' => $sertifikatPath3,
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
            'pelatihan_diikuti1' => 'required|string|max:255',
            'sertifikat1' => 'nullable|file|mimes:jpg,png,pdf',
            'pelatihan_diikuti2' => 'required|string|max:255',
            'sertifikat2' => 'nullable|file|mimes:jpg,png,pdf',
            'pelatihan_diikuti3' => 'required|string|max:255',
            'sertifikat3' => 'nullable|file|mimes:jpg,png,pdf',
        ]);

        $dataKader = DataKader::findOrFail($id);

        $dataKader->nama = $request->nama;
        $dataKader->no_hp = $request->no_hp;
        $dataKader->jabatan = $request->jabatan;
        $dataKader->tempat_lahir = $request->tempat_lahir;
        $dataKader->tanggal_lahir = $request->tanggal_lahir;
        $dataKader->jenis_kelamin = $request->jenis_kelamin;
        $dataKader->pertama_kali = $request->pertama_kali;
        $dataKader->pelatihan_diikuti1 = $request->pelatihan_diikuti1;
        $dataKader->pelatihan_diikuti2 = $request->pelatihan_diikuti2;
        $dataKader->pelatihan_diikuti3 = $request->pelatihan_diikuti3;

        if ($request->hasFile('sertifikat1')) {
            if ($dataKader->sertifikat1 && file_exists(public_path($dataKader->sertifikat1))) {
                unlink(public_path($dataKader->sertifikat1));
            }
            $dataKader->sertifikat1 = $request->file('sertifikat1')->move('uploads/sertifkader1', time() . '_' . $request->file('sertifikat1')->getClientOriginalName());
        }

        if ($request->hasFile('sertifikat2')) {
            if ($dataKader->sertifikat2 && file_exists(public_path($dataKader->sertifikat2))) {
                unlink(public_path($dataKader->sertifikat2));
            }
            $dataKader->sertifikat2 = $request->file('sertifikat2')->move('uploads/sertifkader2', time() . '_' . $request->file('sertifikat2')->getClientOriginalName());
        }

        if ($request->hasFile('sertifikat3')) {
            if ($dataKader->sertifikat3 && file_exists(public_path($dataKader->sertifikat3))) {
                unlink(public_path($dataKader->sertifikat3));
            }
            $dataKader->sertifikat3 = $request->file('sertifikat3')->move('uploads/sertifkader3', time() . '_' . $request->file('sertifikat3')->getClientOriginalName());
        }

        $dataKader->save();

        Alert::success('Sukses', 'Data Kader berhasil diperbarui.');
        return redirect()->route('dataposyandu.index');
    }

    public function destroy($id)
    {
        $dataKader = DataKader::findOrFail($id);

        if ($dataKader->sertifikat1 && file_exists(public_path($dataKader->sertifikat1))) {
            unlink(public_path($dataKader->sertifikat1));
        }

        if ($dataKader->sertifikat2 && file_exists(public_path($dataKader->sertifikat2))) {
            unlink(public_path($dataKader->sertifikat2));
        }

        if ($dataKader->sertifikat3 && file_exists(public_path($dataKader->sertifikat3))) {
            unlink(public_path($dataKader->sertifikat3));
        }

        $dataKader->delete();

        Alert::success('Sukses', 'Data Kader berhasil dihapus.');
        return redirect()->route('dataposyandu.index');
    }
}
