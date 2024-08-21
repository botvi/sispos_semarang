<?php

namespace App\Http\Controllers;

use App\Models\MasterStrataPosyandu;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MasterStrataPosyanduController extends Controller
{
    public function index(){
        $stratapos = MasterStrataPosyandu::all();
        return view('pageadmin.master_strata.index', compact('stratapos'));
    }

    public function create(){
        return view('pageadmin.master_strata.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        // Membuat kategori baru
        $stratapos = new MasterStrataPosyandu();
        $stratapos->nama = $request->input('nama');
        $stratapos->save();

        // Set success message
        Alert::success('Success', 'Strata berhasil ditambahkan.');

        // Redirect dengan pesan sukses
        return redirect()->route('stratapos.index');
    }

    public function edit($id)
    {
        $stratapos = MasterStrataPosyandu::findOrFail($id);
        return view('pageadmin.master_strata.edit', compact('stratapos'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        // Update stratapos
        $stratapos = MasterStrataPosyandu::findOrFail($id);
        $stratapos->nama = $request->input('nama');
        $stratapos->save();

        // Set success message
        Alert::success('Success', 'Strata berhasil diperbarui.');

        // Redirect dengan pesan sukses
        return redirect()->route('stratapos.index');
    }

    public function destroy($id)
    {
        $stratapos = MasterStrataPosyandu::findOrFail($id);
        $stratapos->delete();

        // Set success message
        Alert::success('Success', 'Strata berhasil dihapus.');

        return redirect()->route('stratapos.index');
    }
}