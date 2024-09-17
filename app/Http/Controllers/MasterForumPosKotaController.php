<?php

namespace App\Http\Controllers;

use App\Models\MasterForumPosKota;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MasterForumPosKotaController extends Controller
{
    // Display list of forum pos kota
    public function index()
    {
        $forumPosKota = MasterForumPosKota::with('user')->get();
        return view('pageadmin.master_forum_pos_kota.index', compact('forumPosKota'));
    }

    // Show form for creating new forum pos kota
    public function create()
    {
        return view('pageadmin.master_forum_pos_kota.create');
    }

    // Store newly created forum pos kota
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

        // Create user with role 'forum_pos_kota'
        $user = User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'forum_posyandu_kota',
        ]);

        // Create forum pos kota
        MasterForumPosKota::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'penanggung_jawab' => $request->penanggung_jawab,
            'telepon_penanggung_jawab' => $request->telepon_penanggung_jawab,
            'user_id' => $user->id,
        ]);

        Alert::success('Success', 'Forum Pos Kota successfully created!');
        return redirect()->route('forum_pos_kota.index');
    }

    // Show form for editing forum pos kota
    public function edit($id)
    {
        $forumPosKota = MasterForumPosKota::findOrFail($id);
        $user = User::findOrFail($forumPosKota->user_id);

        return view('pageadmin.master_forum_pos_kota.edit', compact('forumPosKota', 'user'));
    }

    // Update forum pos kota
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

        // Update MasterForumPosKota
        $forumPosKota = MasterForumPosKota::findOrFail($id);
        $user = User::findOrFail($forumPosKota->user_id);

        $forumPosKota->update([
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

        Alert::success('Success', 'Forum Pos Kota and associated user successfully updated!');
        return redirect()->route('forum_pos_kota.index');
    }

    // Delete forum pos kota
    public function destroy($id)
    {
        $forumPosKota = MasterForumPosKota::findOrFail($id);
        $user = User::findOrFail($forumPosKota->user_id);

        $forumPosKota->delete();
        $user->delete();

        Alert::success('Deleted', 'Forum Pos Kota and associated user successfully deleted!');
        return redirect()->route('forum_pos_kota.index');
    }
}
