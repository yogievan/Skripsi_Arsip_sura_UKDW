<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SekretariatController extends Controller
{
    public function ViewDashboard(){
        return view('sekretariat.dashboard');
    }
}
