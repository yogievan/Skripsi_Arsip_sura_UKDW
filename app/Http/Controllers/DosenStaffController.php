<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DosenStaffController extends Controller
{
    public function ViewDashboard(){
        return view('dosen_staff.dashboard');
    }
}
