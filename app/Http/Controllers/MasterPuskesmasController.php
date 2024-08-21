<?php

namespace App\Http\Controllers;

use App\Models\MasterPuskesmas;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MasterPuskesmasController extends Controller
{
    // Display list of puskesmas
    public function index()
    {
        $puskesmas = MasterPuskesmas::with('user')->get();
        return view('pageadmin.master_puskesmas.index', compact('puskesmas'));
    }

    // Show form for creating new puskesmas
    public function create()
    {
        return view('pageadmin.master_puskesmas.create');
    }

    // Store newly created puskesmas
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email',
            'penanggung_jawab' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string|confirmed|min:6',
        ]);

        // Create user with role 'puskesmas'
        $user = User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'puskesmas',
        ]);

        // Create puskesmas
        MasterPuskesmas::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'penanggung_jawab' => $request->penanggung_jawab,
            'user_id' => $user->id,
        ]);

        Alert::success('Success', 'Puskesmas successfully created!');
        return redirect()->route('puskesmas.index');
    }

    // Show form for editing puskesmas
    public function edit($id)
    {
        $puskesmas = MasterPuskesmas::findOrFail($id);
        $user = User::findOrFail($puskesmas->user_id);

        return view('pageadmin.master_puskesmas.edit', compact('puskesmas', 'user'));
    }

    // Update puskesmas
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email,' . $id,
            'penanggung_jawab' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'nullable|string|confirmed|min:6',
        ]);

        // Update MasterPuskesmas
        $puskesmas = MasterPuskesmas::findOrFail($id);
        $user = User::findOrFail($puskesmas->user_id);

        $puskesmas->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'penanggung_jawab' => $request->penanggung_jawab,
        ]);

        // Update User
        $user->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->filled('password') ? bcrypt($request->password) : $user->password,
        ]);

        Alert::success('Success', 'Puskesmas and associated user successfully updated!');
        return redirect()->route('puskesmas.index');
    }

    // Delete puskesmas
    public function destroy($id)
    {
        $puskesmas = MasterPuskesmas::findOrFail($id);
        $user = User::findOrFail($puskesmas->user_id);

        $puskesmas->delete();
        $user->delete();

        Alert::success('Deleted', 'Puskesmas and associated user successfully deleted!');
        return redirect()->route('puskesmas.index');
    }
}
