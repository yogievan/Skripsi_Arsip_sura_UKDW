<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KepalaUnitController extends Controller
{
    public function ViewDashboard(){
        return view('kepala_unit.dashboard');
    }
}
