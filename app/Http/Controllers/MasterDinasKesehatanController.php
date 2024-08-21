<?php

namespace App\Http\Controllers;

use App\Models\MasterDinasKesehatan;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MasterDinasKesehatanController extends Controller
{
    // Display list of dinkes
    public function index()
    {
        $dinkes = MasterDinasKesehatan::with('user')->get();
        return view('pageadmin.master_dinkes.index', compact('dinkes'));
    }

    // Show form for creating new dinkes
    public function create()
    {
        return view('pageadmin.master_dinkes.create');
    }

    // Store newly created dinkes
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

        // Create user with role 'dinkes'
        $user = User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'dinaskesehatan',
        ]);

        // Create dinkes
        MasterDinasKesehatan::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'penanggung_jawab' => $request->penanggung_jawab,
            'telepon_penanggung_jawab' => $request->telepon_penanggung_jawab,
            'user_id' => $user->id,
        ]);

        Alert::success('Success', 'Dinas Kesehatan successfully created!');
        return redirect()->route('dinkes.index');
    }

    // Show form for editing dinkes
    public function edit($id)
    {
        $dinkes = MasterDinasKesehatan::findOrFail($id);
        $user = User::findOrFail($dinkes->user_id);

        return view('pageadmin.master_dinkes.edit', compact('dinkes', 'user'));
    }

    // Update dinkes
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'penanggung_jawab' => 'required|string|max:255',
            'telepon_penanggung_jawab' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'nullable|string|confirmed|min:6',
        ]);

        // Update dinkes
        $dinkes = MasterDinasKesehatan::findOrFail($id);
        $user = User::findOrFail($dinkes->user_id);

        $dinkes->update([
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

        Alert::success('Success', 'Dinas Kesehatan and associated user successfully updated!');
        return redirect()->route('dinkes.index');
    }

    // Delete dinkes
    public function destroy($id)
    {
        $dinkes = MasterDinasKesehatan::findOrFail($id);
        $user = User::findOrFail($dinkes->user_id);

        $dinkes->delete();
        $user->delete();

        Alert::success('Deleted', 'Dinas Kesehatan and associated user successfully deleted!');
        return redirect()->route('dinkes.index');
    }
}
