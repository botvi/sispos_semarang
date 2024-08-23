<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\RegPosyandu;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\MasterPuskesmas;
use RealRashid\SweetAlert\Facades\Alert;

class ProfilController extends Controller
{
    public function editProfile()
    {
        $user = Auth::user();
        $regPosyandu = RegPosyandu::where('user_id', $user->id)->first();

        // Fetch related data for dropdowns
        $kecamatans = Kecamatan::all();
        $kelurahans = Kelurahan::all();
        $puskesmasList = MasterPuskesmas::all();

        return view('pageadmin.profil.index', compact('user', 'regPosyandu', 'kecamatans', 'kelurahans', 'puskesmasList'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $regPosyandu = DB::table('reg_posyandus')->where('user_id', $user->id)->first();
    
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'alamat_lengkap' => 'required|string',
            'rw' => 'required|string|max:10',
            'rt' => 'required|string|max:10',
            'puskesmas_id' => 'required|exists:master_puskesmas,id',
            'kecamatan_id' => 'required|exists:kecamatans,kecamatan_id',
            'kelurahan_id' => 'required|exists:kelurahans,kelurahan_id',
        ]);
    
        // Verifikasi password saat ini jika ingin mengubah password
        if ($request->filled('password')) {
            $request->validate([
                'current_password' => 'required|string|min:8',
                'password' => 'nullable|string|min:8|confirmed',
            ]);
    
            if (!Hash::check($request->current_password, $user->password)) {
                return redirect()->route('profile.edit')->with('error', 'Password saat ini tidak sesuai.');
            }
    
            $user->password = Hash::make($request->password);
        }
    
        // Update data user
        DB::table('users')->where('id', $user->id)->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $user->password,
        ]);
    
        // Update data reg posyandu
        if ($regPosyandu) {
            DB::table('reg_posyandus')->where('user_id', $user->id)->update([
                'nama' => $request->nama, // Sinkronisasi nama dengan User
                'alamat_lengkap' => $request->alamat_lengkap,
                'rw' => $request->rw,
                'rt' => $request->rt,
                'puskesmas_id' => $request->puskesmas_id,
                'kecamatan_id' => $request->kecamatan_id,
                'kelurahan_id' => $request->kelurahan_id,
            ]);
        } else {
            return redirect()->route('profile.edit')->with('error', 'RegPosyandu tidak ditemukan.');
        }
    
        return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui.');
    }
    
}
