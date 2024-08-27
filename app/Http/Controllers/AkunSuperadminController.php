<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class AkunSuperadminController extends Controller
{
    // Show the form for editing the current user's details
    public function index()
    {
        $user = Auth::user();
        return view('pageadmin.account_user.superadmin', compact('user'));
    }

    // Update the current user's details
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'current_password' => 'nullable|string',
            'password' => 'nullable|string|min:8|confirmed',
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

        Alert::success('Success', 'Akun berhasil diperbarui.');
        return redirect()->back();
    }
}
