<?php

namespace App\Http\Controllers;

use App\Models\MasterKordinatorKec;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MasterKordinatorKecController extends Controller
{
    // Display list of kordinator kecamatan
    public function index()
    {
        $kordinatorKec = MasterKordinatorKec::with('user')->get();
        return view('pageadmin.master_kordinator_kec.index', compact('kordinatorKec'));
    }

    // Show form for creating new kordinator kecamatan
    public function create()
    {
        return view('pageadmin.master_kordinator_kec.create');
    }

    // Store newly created kordinator kecamatan
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'penanggung_jawab' => 'required|string|max:255',
            'telepon_penanggung_jawab' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string|confirmed|min:6',
        ]);

        // Create user with role 'kordinator_kecamatan'
        $user = User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'kordinator_kecamatan',
        ]);

        // Create kordinator kecamatan
        MasterKordinatorKec::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'penanggung_jawab' => $request->penanggung_jawab,
            'telepon_penanggung_jawab' => $request->telepon_penanggung_jawab,
            'user_id' => $user->id,
        ]);

        Alert::success('Success', 'Kordinator Kecamatan successfully created!');
        return redirect()->route('kordinator_kec.index');
    }

    // Show form for editing kordinator kecamatan
    public function edit($id)
    {
        $kordinatorKec = MasterKordinatorKec::findOrFail($id);
        $user = User::findOrFail($kordinatorKec->user_id);

        return view('pageadmin.master_kordinator_kec.edit', compact('kordinatorKec', 'user'));
    }

    // Update kordinator kecamatan
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'penanggung_jawab' => 'required|string|max:255',
            'telepon_penanggung_jawab' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'nullable|string|confirmed|min:6',
        ]);

        // Update MasterKordinatorKec
        $kordinatorKec = MasterKordinatorKec::findOrFail($id);
        $user = User::findOrFail($kordinatorKec->user_id);

        $kordinatorKec->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'penanggung_jawab' => $request->penanggung_jawab,
            'telepon_penanggung_jawab' => $request->telepon_penanggung_jawab,
        ]);

        // Update User
        $user->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->filled('password') ? bcrypt($request->password) : $user->password,
        ]);

        Alert::success('Success', 'Kordinator Kecamatan and associated user successfully updated!');
        return redirect()->route('kordinator_kec.index');
    }

    // Delete kordinator kecamatan
    public function destroy($id)
    {
        $kordinatorKec = MasterKordinatorKec::findOrFail($id);
        $user = User::findOrFail($kordinatorKec->user_id);

        $kordinatorKec->delete();
        $user->delete();

        Alert::success('Deleted', 'Kordinator Kecamatan and associated user successfully deleted!');
        return redirect()->route('kordinator_kec.index');
    }
}
