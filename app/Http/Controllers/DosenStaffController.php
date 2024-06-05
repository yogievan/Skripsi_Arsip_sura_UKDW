<?php

namespace App\Http\Controllers;

use App\Models\disposisiSuratKeluar;
use App\Models\disposisiSuratMasuk;
use App\Models\Kategori;
use App\Models\Sifat;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class DosenStaffController extends Controller
{
    public function ViewDashboard(){
        return view('dosen_staff.dashboard');
    }

    public function DetailArsipSuratMasuk($id){
        $suratMasuk = SuratMasuk::find($id);
        $suratKeluar = SuratKeluar::all();
        $users = User::all();
        $unit = Unit::all();
        $kategori_surat = Kategori::all();
        $sifat = Sifat::all();
        $year = date('Y');

        if(empty($suratMasuk->lampiran_1)){
            $lampiran_1 = "hidden";
        }else{
            $lampiran_1 = "";
        }

        if(empty($suratMasuk->lampiran_2)){
            $lampiran_2 = "hidden";
        }else{
            $lampiran_2 = "";
        }

        if(empty($suratMasuk->lampiran_3)){
            $lampiran_3 = "hidden";
        }else{
            $lampiran_3 = "";
        }

        return view('dosen_staff.detail_arsip_surat_masuk', compact('suratMasuk'),
        [
            'suratMasuk' => $suratMasuk,
            'suratKeluar' => $suratKeluar,
            'users' => $users,
            'unit' => $unit,
            'kategori_surat' => $kategori_surat,
            'sifat' => $sifat,
            'lampiran_1' => $lampiran_1,
            'lampiran_2' => $lampiran_2,
            'lampiran_3' => $lampiran_3,
            'year' => $year,
        ]);
    }
    public function DetailArsipSuratKeluar($id){
        $suratkeluar = SuratKeluar::find($id);
        $users = User::all();
        $unit = Unit::all();
        $kategori = Kategori::all();
        $sifat = Sifat::all();

        if(empty($suratkeluar->lampiran_1)){
            $lampiran_1 = "hidden";
        }else{
            $lampiran_1 = "";
        }

        if(empty($suratkeluar->lampiran_2)){
            $lampiran_2 = "hidden";
        }else{
            $lampiran_2 = "";
        }

        if(empty($suratkeluar->lampiran_3)){
            $lampiran_3 = "hidden";
        }else{
            $lampiran_3 = "";
        }

        return view('dosen_staff.detail_arsip_surat_keluar', compact('suratkeluar'),
        [
            'suratkeluar' => $suratkeluar,
            'users' => $users,
            'unit' => $unit,
            'kategori' => $kategori,
            'sifat' => $sifat,
            'lampiran_1' => $lampiran_1,
            'lampiran_2' => $lampiran_2,
            'lampiran_3' => $lampiran_3,
        ]);
    }
    public function ListArsipSuratMasuk(){
        $penerima = Auth::user()->email;
        $suratMasuk = SuratMasuk::orderBy('id', 'DESC')->where('penerima', $penerima)->paginate(25);
        $date = date('D, d M Y');

        return view('dosen_staff.list_arsip_surat_masuk',
        [
            'suratMasuk' => $suratMasuk,
            'date' => $date,
        ]);
    }

    public function ListArsipSuratKeluar(){
        $penerima = Auth::user()->email;
        $suratKeluar = SuratKeluar::orderBy('id', 'DESC')->where('penerima', $penerima)->paginate(25);
        $date = date('D, d M Y');

        return view('dosen_staff.list_arsip_surat_keluar',
        [
            'suratKeluar' => $suratKeluar,
            'date' => $date,
        ]);
    }
    public function ListArsipDisposisiSuratMasuk(){
        $penerima = Auth::user()->email;
        $disposisiSuratMasuk = disposisiSuratMasuk::orderBy('id', 'DESC')->where('penerima', $penerima)->paginate(25);
        $date = date('D, d M Y');

        return view('dosen_staff.list_arsip_disposisi_surat_masuk',
        [
            'disposisiSuratMasuk' => $disposisiSuratMasuk,
            'date' => $date,
        ]);
    }

    public function ListArsipDisposisiSuratKeluar(){
        $penerima = Auth::user()->email;
        $disposisiSuratKeluar = disposisiSuratKeluar::orderBy('id', 'DESC')->where('penerima', $penerima)->paginate(25);
        $date = date('D, d M Y');

        return view('dosen_staff.list_arsip_disposisi_surat_keluar',
        [
            'disposisiSuratKeluar' => $disposisiSuratKeluar,
            'date' => $date,
        ]);
    }
    public function DetailArsipDisposisiSuratMasuk($id, $id_surat_masuk){
        $disposisiSuratMasuk = disposisiSuratMasuk::find($id);
        $suratMasuk = SuratMasuk::find($id_surat_masuk);
        $users = User::all();
        $unit = Unit::all();
        $kategori_surat = Kategori::all();
        $sifat = Sifat::all();

        if(empty($disposisiSuratMasuk->lampiran_1)){
            $lampiran_1 = "hidden";
        }else{
            $lampiran_1 = "";
        }

        if(empty($disposisiSuratMasuk->lampiran_2)){
            $lampiran_2 = "hidden";
        }else{
            $lampiran_2 = "";
        }

        if(empty($disposisiSuratMasuk->lampiran_3)){
            $lampiran_3 = "hidden";
        }else{
            $lampiran_3 = "";
        }

        if($disposisiSuratMasuk -> status_disposisi == "Surat Telah Ditindak Lanjut"){
            $validasi = "hidden";
        } else{
            $validasi = "";
        }

        return view('dosen_staff.detail_arsip_disposisi_surat_masuk', compact('disposisiSuratMasuk'),
        [
            'disposisiSuratMasuk' => $disposisiSuratMasuk,
            'suratMasuk' => $suratMasuk,
            'users' => $users,
            'unit' => $unit,
            'kategori_surat' => $kategori_surat,
            'sifat' => $sifat,
            'lampiran_1' => $lampiran_1,
            'lampiran_2' => $lampiran_2,
            'lampiran_3' => $lampiran_3,
            'validasi' => $validasi,
        ]);
    }
    public function DetailArsipDisposisiSuratKeluar($id, $id_surat_keluar){
        $disposisiSuratKeluar = disposisiSuratKeluar::find($id);
        $suratKeluar = SuratKeluar::find($id_surat_keluar);
        $users = User::all();
        $unit = Unit::all();
        $kategori_surat = Kategori::all();
        $sifat = Sifat::all();

        if(empty($disposisiSuratKeluar->lampiran_1)){
            $lampiran_1 = "hidden";
        }else{
            $lampiran_1 = "";
        }

        if(empty($disposisiSuratKeluar->lampiran_2)){
            $lampiran_2 = "hidden";
        }else{
            $lampiran_2 = "";
        }

        if(empty($disposisiSuratKeluar->lampiran_3)){
            $lampiran_3 = "hidden";
        }else{
            $lampiran_3 = "";
        }

        if($disposisiSuratKeluar -> status_disposisi == "Surat Telah Ditindak Lanjut"){
            $validasi = "hidden";
        } else{
            $validasi = "";
        }

        return view('dosen_staff.detail_arsip_disposisi_surat_keluar', compact('disposisiSuratKeluar'),
        [
            'disposisiSuratKeluar' => $disposisiSuratKeluar,
            'suratKeluar' => $suratKeluar,
            'users' => $users,
            'unit' => $unit,
            'kategori_surat' => $kategori_surat,
            'sifat' => $sifat,
            'lampiran_1' => $lampiran_1,
            'lampiran_2' => $lampiran_2,
            'lampiran_3' => $lampiran_3,
            'validasi' => $validasi,
        ]);
    }

    public function TindakLanjutDetailArsipDisposisiSuratMasuk($id, Request $request){
        $disposisiSuratMasuk = disposisiSuratMasuk::find($id);
        $status_disposisi = "Surat Telah Ditindak Lanjut";
        $disposisiSuratMasuk -> status_disposisi = $status_disposisi;
        $disposisiSuratMasuk -> save();
        Alert::toast('Surat Berhasil Ditindak Lanjut!','success');
        return Redirect::back(); 
    }

    public function TindakLanjutDetailArsipDisposisiSuratKeluar($id, Request $request){
        $disposisiSuratKeluar = disposisiSuratKeluar::find($id);
        $status_disposisi = "Surat Telah Ditindak Lanjut";
        $disposisiSuratKeluar -> status_disposisi = $status_disposisi;
        $disposisiSuratKeluar -> save();
        Alert::toast('Surat Berhasil Ditindak Lanjut!','success');
        return Redirect::back(); 
    }
}
