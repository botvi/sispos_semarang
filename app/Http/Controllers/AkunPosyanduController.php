<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // Make sure to include Hash facade
use App\Models\User;
use App\Models\RegPosyandu;
use RealRashid\SweetAlert\Facades\Alert;

class AkunPosyanduController extends Controller
{
    public function index()
{
    $user = Auth::user();
    $regPosyandu = $user->RegPosyandu;

    // Fetch related Kecamatan and Kelurahan
    $kecamatan = $regPosyandu->kecamatan;
    $kelurahan = $regPosyandu->kelurahan;

    return view('pageadmin.account_user.posyandu', compact('user', 'regPosyandu', 'kecamatan', 'kelurahan'));
}

    
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8|confirmed', // Password change validation
        ]);

        $user->update($request->only('nama', 'username', 'email'));

        // If a new password is provided, update it using bcrypt
        if ($request->filled('password')) {
            // Verify the current password
            if (!Hash::check($request->input('current_password'), $user->password)) {
                return redirect()->back()->withErrors(['current_password' => 'Password lama salah.']);
            }
            // Hash the new password using bcrypt and update it
            $user->update(['password' => Hash::make($request->input('password'))]);
        }

        // If the user's role is 'posyandu', update the associated RegPosyandu name
        if ($user->role == 'posyandu') {
            $regPosyandu = $user->RegPosyandu;
            if ($regPosyandu) {
                $regPosyandu->update(['nama' => $request->nama]);
            }
        }

        Alert::success('Success', 'Akun berhasil diperbarui.');
        return redirect()->back();
    }
}

