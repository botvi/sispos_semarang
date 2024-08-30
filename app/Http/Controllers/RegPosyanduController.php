<?php

namespace App\Http\Controllers;

use App\Models\RegPosyandu;
use App\Models\Kelurahan;
use App\Models\Kecamatan;
use App\Models\MasterPuskesmas;
use App\Models\Puskesmas;
use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Log; // Import Log facade

class RegPosyanduController extends Controller
{

    public function getKelurahanByKecamatan($kecamatan_id)
{
    $kelurahans = Kelurahan::where('kecamatan_id', $kecamatan_id)->get();
    return response()->json($kelurahans);
}

    // Show the registration form
    public function showRegistrationForm()
{
    // Fetch all kecamatans
    $kecamatans = Kecamatan::all();
    $puskesmas = MasterPuskesmas::all();

    return view('auth.registrasi', compact('kecamatans','puskesmas')); // Pass the kecamatans to the view
}


    // Handle the registration request
    public function register(Request $request)
    {
        // Validate the request data
        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'rw' => 'required|string|max:10',
            'rt' => 'required|string|max:10',
            'puskesmas_id' => 'required|integer',
            'kecamatan_id' => 'required|integer',
            'kelurahan_id' => 'required|integer',
            'alamat_lengkap' => 'required|string|max:255',
        ]);

        // Log request data (for debugging purposes)
        Log::info($request->all()); // Use Log facade

        // Create a new user
        $user = User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'posyandu', // Ensure this role is valid in your User model
        ]);

        // Create a new RegPosyandu entry
        RegPosyandu::create([
            'nama' => $request->nama,
            'rw' => $request->rw,
            'rt' => $request->rt,
            'puskesmas_id' => $request->puskesmas_id,
            'kecamatan_id' => $request->kecamatan_id,
            'kelurahan_id' => $request->kelurahan_id,
            'alamat_lengkap' => $request->alamat_lengkap,
            'user_id' => $user->id,
            'status' => 'pending',
        ]);

        // Display a success message
        Alert::success('Success', 'Posyandu successfully created!');

        // Redirect to the registration form or another route
        return redirect('/login');    }
}
