<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\RegPosyandu;

class LoginController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Check role and redirect accordingly
            if ($user->role == 'superadmin') {
                Alert::success('Login Successful', 'Welcome back, Superadmin!');
                return redirect()->route('superadmin.dashboard');
            } elseif ($user->role == 'dinaskesehatan' || $user->role == 'forum_posyandu_kota' || $user->role == 'kordinator_kecamatan') {
                Alert::success('Login Successful', 'Welcome back !');
                return redirect()->route('dinaskesehatan.dashboard');
            } elseif ($user->role == 'puskesmas') {
                Alert::success('Login Successful', 'Welcome back, Puskesmas!');
                return redirect()->route('puskesmas.dashboard');
            } elseif ($user->role == 'posyandu') {
                $posyandu = RegPosyandu::where('user_id', $user->id)->first();

                if ($posyandu && $posyandu->status == 'diterima') {
                    Alert::success('Login Successful', 'Welcome back, Posyandu!');
                    return redirect()->route('posyandu.dashboard');
                } else {
                    Auth::logout();
                    Alert::error('Login Failed', 'Anda belum dikonfirmasi.');
                    return redirect('/login');
                }
            } else {
                // Handle other roles (fallback)
                Auth::logout();
                Alert::error('Login Failed', 'You are not authorized to access this area.');
                return redirect('/login');
            }
        }

        // Authentication failed
        Alert::error('Login Failed', 'The provided credentials do not match our records.');
        return back()->withInput($request->only('username'));
    }



    /**
     * Handle logout.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        Alert::info('Logged Out', 'You have been logged out.');
        return redirect('/login');
    }
}
