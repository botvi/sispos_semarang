<?php

namespace App\Http\Controllers;

use App\Models\MasterPerbekalanKes;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MasterPerbekalanKesController extends Controller
{
    public function index()
    {
        $perbekalan = MasterPerbekalanKes::all();
        return view('pageadmin.master_perbekalankes.index', compact('perbekalan'));
    }

    public function create()
    {
        return view('pageadmin.master_perbekalankes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('uploads/gambar_perbekalankes'), $imageName);

        MasterPerbekalanKes::create([
            'nama' => $request->nama,
            'gambar' => $imageName,
        ]);

        Alert::success('Success', 'Data berhasil disimpan');
        return redirect()->route('master-perbekalankes.index');
    }

    public function edit($id)
    {
        $masterPerbekalanKes = MasterPerbekalanKes::findOrFail($id);
        return view('pageadmin.master_perbekalankes.edit', compact('masterPerbekalanKes'));
    }

    public function update(Request $request, $id)
    {
        $perbekalan = MasterPerbekalanKes::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = ['nama' => $request->nama];

        if ($request->hasFile('gambar')) {
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('uploads/gambar_perbekalankes'), $imageName);

            if ($perbekalan->gambar) {
                unlink(public_path('uploads/gambar_perbekalankes/' . $perbekalan->gambar));
            }

            $data['gambar'] = $imageName;
        }

        $perbekalan->update($data);

        Alert::success('Success', 'Data berhasil diperbarui');
        return redirect()->route('master-perbekalankes.index');
    }

    public function destroy($id)
    {
        $perbekalan = MasterPerbekalanKes::findOrFail($id);

        if ($perbekalan->gambar) {
            unlink(public_path('uploads/gambar_perbekalankes/' . $perbekalan->gambar));
        }

        $perbekalan->delete();

        Alert::success('Success', 'Data berhasil dihapus');
        return redirect()->route('master-perbekalankes.index');
    }
}
