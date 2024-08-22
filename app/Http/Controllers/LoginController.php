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

            // Check the role of the user and redirect accordingly
            if (in_array($user->role, ['superadmin', 'dinaskesehatan', 'puskesmas'])) {
                Alert::success('Login Successful', 'Welcome back!');
                return redirect()->intended('dashboard');
            }

            // If the role is posyandu, check the status in RegPosyandu
            if ($user->role == 'posyandu') {
                $posyandu = RegPosyandu::where('user_id', $user->id)->first();

                if ($posyandu && $posyandu->status == 'diterima') {
                    Alert::success('Login Successful', 'Welcome back!');
                    return redirect()->intended('dashboard');
                } else {
                    Auth::logout();
                    Alert::error('Login Failed', 'Anda belum di konfirmasi.');
                    return redirect('/login');
                }
            }

            // Handle other roles (fallback)
            Auth::logout();
            Alert::error('Login Failed', 'You are not authorized to access this area.');
            return redirect('/login');
        }

        // Authentication failed
        Alert::error('Login Failed', 'The provided credentials do not match our records.');
        return back();
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
