<?php

namespace App\Http\Controllers;

use App\Models\MasterPeralatanKes;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class MasterPeralatanKesController extends Controller
{
    public function index()
    {
        $peralatan = MasterPeralatanKes::all();
        return view('pageadmin.master_peralatankes.index', compact('peralatan'));
    }

    public function create()
    {
        return view('pageadmin.master_peralatankes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('uploads/gambar_peralatankes'), $imageName);

        MasterPeralatanKes::create([
            'nama' => $request->nama,
            'gambar' => $imageName,
        ]);

        Alert::success('Success', 'Data berhasil disimpan');
        return redirect()->route('master-peralatankes.index');
    }

    public function edit($id)
    {
        $masterPeralatanKes = MasterPeralatanKes::findOrFail($id);
        return view('pageadmin.master_peralatankes.edit', compact('masterPeralatanKes'));
    }

    public function update(Request $request, $id)
    {
        $peralatan = MasterPeralatanKes::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = ['nama' => $request->nama];

        if ($request->hasFile('gambar')) {
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('uploads/gambar_peralatankes'), $imageName);

            // Delete old image
            if ($peralatan->gambar) {
                unlink(public_path('uploads/gambar_peralatankes/' . $peralatan->gambar));
            }

            $data['gambar'] = $imageName;
        }

        $peralatan->update($data);

        Alert::success('Success', 'Data berhasil diperbarui');
        return redirect()->route('master-peralatankes.index');
    }

    public function destroy($id)
    {
        $peralatan = MasterPeralatanKes::findOrFail($id);

        if ($peralatan->gambar) {
            unlink(public_path('uploads/gambar_peralatankes/' . $peralatan->gambar));
        }

        $peralatan->delete();

        Alert::success('Success', 'Data berhasil dihapus');
        return redirect()->route('master-peralatankes.index');
    }
}
