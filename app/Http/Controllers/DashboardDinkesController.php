<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardDinkesController extends Controller
{
    public function index(){
        return view('pageadmin.dashboard_dinaskesehatan.index');
    }
}
