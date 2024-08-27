<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\MasterDinasKesehatan;
use RealRashid\SweetAlert\Facades\Alert;

class AkunDinasKesehatanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $masterDinkes = $user->masterDinasKesehatan;

        return view('pageadmin.account_user.dinaskesehatan', compact('user', 'masterDinkes'));
    }

    public function update(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'nama' => 'required|string|max:255',
        'username' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'current_password' => 'nullable|string',
        'password' => 'nullable|string|min:8|confirmed',
        'alamat' => 'required|string|max:255',
        'telepon' => 'required|string|max:15',
        'penanggung_jawab' => 'required|string|max:255',
        'telepon_penanggung_jawab' => 'required|string|max:15',
    ]);

    // Update user information
    $userData = $request->only('nama', 'username', 'email');
    $user->update($userData);

    // If a new password is provided, update it
    if ($request->filled('password')) {
        if (!Hash::check($request->input('current_password'), $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Password lama salah.']);
        }
        $user->update(['password' => Hash::make($request->input('password'))]);
    }

    // Update MasterDinasKesehatan model
    if ($user->role == 'dinaskesehatan') {
        $masterDinkes = $user->masterDinasKesehatan;
        if ($masterDinkes) {
            $masterDinkesData = $request->only('alamat', 'telepon', 'penanggung_jawab', 'telepon_penanggung_jawab');
            $masterDinkes->update($masterDinkesData);

            // Ensure the nama field in MasterDinasKesehatan is updated
            if ($request->filled('nama')) {
                $masterDinkes->update(['nama' => $request->input('nama')]);
            }
        }
    }

    Alert::success('Success', 'Akun berhasil diperbarui.');
    return redirect()->back();}

}
