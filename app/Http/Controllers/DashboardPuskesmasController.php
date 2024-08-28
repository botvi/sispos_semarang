<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardPuskesmasController extends Controller
{
    public function index(){
        return view('pageadmin.dashboard_puskesmas.index');
    }
}
