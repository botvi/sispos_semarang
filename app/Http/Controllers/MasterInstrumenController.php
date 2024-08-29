<?php

namespace App\Http\Controllers;

use App\Models\MasterInstrumen;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MasterInstrumenController extends Controller
{
    public function index()
    {
        $instrumen = MasterInstrumen::all();
        return view('pageadmin.master_instrumen.index', compact('instrumen'));
    }

    public function create()
    {
        return view('pageadmin.master_instrumen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = time() . '.' . $request->gambar->extension();
        $request->gambar->move('uploads/gambar_instrumen', $imageName);

        MasterInstrumen::create([
            'nama' => $request->nama,
            'gambar' => $imageName,
        ]);

        Alert::success('Success', 'Data berhasil disimpan');
        return redirect()->route('master-instrumen.index');
    }

    public function edit($id)
    {
        $instrumen = MasterInstrumen::findOrFail($id);
        return view('pageadmin.master_instrumen.edit', compact('instrumen'));
    }

    public function update(Request $request, $id)
    {
        $instrumen = MasterInstrumen::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = ['nama' => $request->nama];

        if ($request->hasFile('gambar')) {
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move('uploads/gambar_instrumen', $imageName);

            // Hapus gambar lama
            if ($instrumen->gambar) {
                unlink('uploads/gambar_instrumen/' . $instrumen->gambar);
            }

            $data['gambar'] = $imageName;
        }

        $instrumen->update($data);

        Alert::success('Success', 'Data berhasil diperbarui');
        return redirect()->route('master-instrumen.index');
    }

    public function destroy($id)
    {
        $instrumen = MasterInstrumen::findOrFail($id);

        if ($instrumen->gambar) {
            unlink('uploads/gambar_instrumen/' . $instrumen->gambar);
        }

        $instrumen->delete();

        Alert::success('Success', 'Data berhasil dihapus');
        return redirect()->route('master-instrumen.index');
    }
}
