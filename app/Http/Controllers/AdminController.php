<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Kategori;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function ViewKelolaPengguna(){
        $jabatan = Jabatan::all();
        $unit = Unit::all();
        $users = User::orderBy('id','DESC')->paginate(25);
        return view('admin.kelola_pengguna',
        [
            'jabatan' => $jabatan,
            'unit' => $unit,
            'users' => $users,
        ]);
    }

    public function TambahPengguna(Request $request){
        User::create([
            'nama' => $request -> nama,
            'username' => $request -> username,
            'email' => $request -> email,
            'password' => bcrypt($request -> password),
            'role' => $request -> role,
            'id_unit' => $request -> id_unit,
            'id_jabatan' => $request -> id_jabatan,

        ]);
        Alert::toast('Data pengguna berhasil ditambahkan!','success');
        return Redirect::back();
    }

    public function DetailPengguna($id){
        $user = User::find($id);
        $units = Unit::all();
        $jabatans = Jabatan::all();

        return view('admin.detail_pengguna', 
        [
            'user' => $user,
        ]);
    }

    public function ViewKategori(){
        $kategori = Kategori::orderBy('id','DESC')->paginate(10);
        return view('admin.kategori',
        [
            'kategori' => $kategori,
        ]);
    } 

    public function TambahKategori(Request $request){
        Kategori::create([
            'kategori_surat' => $request -> kategori_surat,
            'deskripsi' => $request -> deskripsi,
        ]);
        Alert::toast('Data kategori surat berhasil ditambahkan!','success');
        return Redirect::back();
    }

    public function ViewEditKategori($id){
        $kategori = Kategori::find($id);
        return view('admin.update_kategori',
        [
            'kategori' => $kategori,
        ]);
    }
    public function EditKategori($id, Request $request){
        $kategori = Kategori::find($id);
        $kategori -> kategori_surat = $request -> kategori_surat;
        $kategori -> deskripsi = $request -> deskripsi;
        $kategori -> save();
        Alert::toast('Data kategori surat berhasil diperbarui!','success');
        return redirect(route('Kategori_admin'));
    }

    public function HapusKategori($id){
        $kategori = Kategori::find($id);
        $kategori->delete();
        Alert::toast('Data kategori surat berhasil dihapus!','success');
        return redirect(route('Kategori_admin'));
    }

    public function ViewUnit(){
        $unit = Unit::orderBy('id','DESC')->paginate(25);
        return view('admin.unit',
        [
            'unit' => $unit,
        ]);
    } 

    public function TambahUnit(Request $request){
        Unit::create([
            'unit' => $request -> unit,
        ]);
        Alert::toast('Data unit UKDW berhasil ditambah!','success');
        return Redirect::back();
    }

    public function ViewEditUnit($id){
        $unit = Unit::find($id);
        return view('admin.update_unit',
        [
            'unit' => $unit,
        ]);
    }

    public function EditUnit($id, Request $request){
        $unit = Unit::find($id);
        $unit -> unit = $request -> unit;
        $unit -> save();
        Alert::toast('Data unit UKDW berhasil diperbarui!','success');
        return redirect(route('Unit_admin'));
    }
    
    public function HapusUnit($id){
        $unit = Unit::find($id);
        $unit->delete();
        Alert::toast('Data unit UKDW berhasil dihapus!','success');
        return redirect(route('Unit_admin'));
    }

    public function ViewJabatan(){
        $jabatan = Jabatan::orderBy('id','DESC')->paginate(25);
        return view('admin.jabatan',
        [
            'jabatan' => $jabatan,
        ]);
    }
    public function TambahJabatan(Request $request){
        Jabatan::create([
            'jabatan' => $request -> jabatan,
        ]);
        Alert::toast('Data jabatan UKDW berhasil ditambah!','success');
        return Redirect::back();
    }
    
    public function ViewEditJabatan($id){
        $jabatan = Jabatan::find($id);
        return view('admin.update_jabatan',
        [
            'jabatan' => $jabatan,
        ]);
    }

    public function EditJabatan($id, Request $request){
        $jabatan = Jabatan::find($id);
        $jabatan -> jabatan = $request -> jabatan;
        $jabatan -> save();
        Alert::toast('Data jabatan UKDW berhasil diperbarui!','success');

        return redirect(route('Jabatan_admin'));
    }
    
    public function HapusJabatan($id){
        $jabatan = Jabatan::find($id);
        $jabatan->delete();
        Alert::toast('Data jabatan UKDW berhasil dihapus!','success');
        return redirect(route('Jabatan_admin'));
    }
}
