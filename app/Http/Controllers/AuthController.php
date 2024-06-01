<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function ViewLogin(){
        return view('auth.login');
    }

    public function ValidateLogin(Request $request){
        // validate
        $request -> validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // validate input request
        $datalogin = [
            'username' => $request -> username,
            'password' => $request -> password,
        ];
        if(Auth::attempt($datalogin)){
            //hak akses
            if(Auth::user()->role == 'Sekretariat'){
                Alert::toast('Login Berhasil, Selamat Datang! ','success');
                return redirect(route('Dashboard_sekretariat'));
            }
            elseif(Auth::user()->role == 'KepalaUnit'){
                Alert::toast('Login Berhasil, Selamat Datang! ','success');
                return redirect(route('Dashboard_kepalaunit'));
            } 
            elseif(Auth::user()->role == 'DosenStaff'){
                Alert::toast('Login Berhasil, Selamat Datang! ','success');
                return redirect(route('Dashboard_dosenstaff'));
            }
            elseif(Auth::user()->role == 'Admin'){
                Alert::toast('Login Berhasil, Selamat Datang! ','success');
                return redirect(route('KelolaPengguna_admin'));
            }
        }
        else{
            Alert::alert()->error('ErrorAlert','Email atau Password tidak terdaftar!');
            return redirect(route('login'));
        }
    }

    public function Logout(){
        Auth::logout();
        return redirect(route('login'));
    }

    public function UpdateUser($id, Request $request){
        $users = User::find($id);
        $users -> nama = $request -> nama;
        $users -> username = $request -> username;
        $users -> password = bcrypt($request -> password);
        $users -> save();
        Alert::toast('Update Data Pengguna Berhasil!','success');
        return Redirect::back();
    }
}
