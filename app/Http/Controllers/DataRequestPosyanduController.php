<?php

namespace App\Http\Controllers;

use App\Models\RegPosyandu;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Support\Facades\Auth;
use App\Models\MasterPuskesmas;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DataRequestPosyanduController extends Controller
{
    public function index()
{
    // Get the logged-in user's ID
    $userId = Auth::id();

    // Find the puskesmas associated with this user
    $puskesmas = MasterPuskesmas::where('user_id', $userId)->first();

    if ($puskesmas) {
        // Get the RegPosyandu data filtered by the puskesmas_id and status
        $pendingPosyandu = RegPosyandu::with(['kecamatan', 'kelurahan', 'puskesmas'])
            ->where('puskesmas_id', $puskesmas->id)
            ->where('status', 'pending')
            ->get();

        $diterimaPosyandu = RegPosyandu::with(['kecamatan', 'kelurahan', 'puskesmas'])
            ->where('puskesmas_id', $puskesmas->id)
            ->where('status', 'diterima')
            ->get();
    } else {
        // If no puskesmas is associated with the user, return empty collections
        $pendingPosyandu = collect();
        $diterimaPosyandu = collect();
    }

    return view('pageadmin.request_posyandu.index', compact('pendingPosyandu', 'diterimaPosyandu'));
}

    

    public function edit($id)
    {
        $posyandu = RegPosyandu::findOrFail($id);
        return view('pageadmin.request_posyandu.edit', compact('posyandu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,diterima',
        ]);

        $posyandu = RegPosyandu::findOrFail($id);
        $posyandu->status = $request->input('status');
        $posyandu->save();

        Alert::success('Success', 'Status updated successfully!');
        return redirect()->route('request-posyandu.index');
    }
}
