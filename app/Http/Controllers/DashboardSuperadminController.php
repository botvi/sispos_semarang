<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegPosyandu;
use App\Models\MasterPuskesmas;
use App\Models\MasterDinasKesehatan;

class DashboardSuperadminController extends Controller
{
    public function index(){

            // Count RegPosyandu with status 'diterima'
            $totalPosyandu = RegPosyandu::where('status', 'diterima')->count();
    
            // Count MasterPuskesmas
            $totalPuskesmas = MasterPuskesmas::count();
    
            // Count MasterDinasKesehatan
            $totalDinasKesehatan = MasterDinasKesehatan::count();
    
       
        return view('pageadmin.dashboard_superadmin.index', compact('totalPosyandu', 'totalPuskesmas', 'totalDinasKesehatan'));
    }
}
