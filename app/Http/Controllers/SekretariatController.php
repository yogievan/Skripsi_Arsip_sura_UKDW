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
use DOMDocument;

class SekretariatController extends Controller
{
    public function ViewDashboard(){
        return view('sekretariat.dashboard');
    }
    public function ViewArsipSurat(){
        $kategori_surat = Kategori::all();
        $unit = Unit::all();
        $date = date('D, d M Y');
        $pengirim = Auth::user()->email;
        $suratMasuk = SuratMasuk::orderBy('id','DESC')->where('pengirim', $pengirim)->whereDate('created_at', now()->toDate())->paginate(5);
        $suratKeluar = SuratKeluar::orderBy('id','DESC')->where('pengirim', $pengirim)->whereDate('created_at', now()->toDate())->paginate(5);
        $year = date('Y');

        return view('sekretariat.arsip_surat',[
            'kategori_surat' => $kategori_surat,
            'unit' => $unit,
            'date' => $date,
            'suratMasuk' => $suratMasuk,
            'suratKeluar' => $suratKeluar,
            'pengirim' => $pengirim,
            'year' => $year,
        ]);
    }
    public function ArsipSuratMasuk(Request $request){
        $catatan = $request->catatan;

        $dom = new DOMDocument();
        $dom->loadHTML($catatan,9);
        $catatan = $dom->saveHTML();
        $status_surat ="Surat Belum Tervalidasi Kepala Unit";
        $kategori_surat = Kategori::all();

        SuratMasuk::create([
            'id_kategori_surat' => $request -> id_kategori_surat,
            'id_unit' => $request -> id_unit,
            'pengirim' => $request -> pengirim,
            'penerima' => $request -> penerima,
            'subjek' => $request -> subjek,
            'catatan' => $catatan,
            'lampiran_1' => $request -> lampiran_1,
            'lampiran_2' => $request -> lampiran_2,
            'lampiran_3' => $request -> lampiran_3,
            'status_surat' => $status_surat,
        ]);
        Alert::toast('Surat Berhasil di Arsipkan!','success');
        return Redirect::back();
    }
    public function ArsipSuratKeluar(Request $request){
        $catatan = $request->catatan;

        $dom = new DOMDocument();
        $dom->loadHTML($catatan,9);
        $catatan = $dom->saveHTML();
        $status_surat ="Surat Belum Tervalidasi Kepala Unit";
        $kode_kategori = $request->id_kategori_surat;
        $no_urut = $request->no_urut;
        $id_unit = $request->id_unit;
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $kode_surat = $kode_kategori.".".$no_urut."/".$id_unit."/".$bulan."/".$tahun;

        SuratKeluar::create([
            'id_kategori_surat' => $request -> id_kategori_surat,
            'id_unit' => $id_unit,
            'kode_surat' => $kode_surat,
            'pengirim' => $request -> pengirim,
            'penerima' => $request -> penerima,
            'subjek' => $request -> subjek,
            'catatan' => $catatan,
            'lampiran_1' => $request -> lampiran_1,
            'lampiran_2' => $request -> lampiran_2,
            'lampiran_3' => $request -> lampiran_3,
            'status_surat' => $status_surat,
        ]);
        Alert::toast('Surat Berhasil di Arsipkan!','success');
        return Redirect::back();
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

        if($suratMasuk -> status_surat == "Surat Tervalidasi Kepala Unit"){
            $akses = "";
        } else{
            $akses = "hidden";
        }

        return view('sekretariat.detail_arsip_surat_masuk', compact('suratMasuk'),
        [
            'suratMasuk' => $suratMasuk,
            'suratKeluar' => $suratKeluar,
            'users' => $users,
            'unit' => $unit,
            'kategori_surat' => $kategori_surat,
            'sifat' => $sifat,
            'akses' => $akses,
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

        if($suratkeluar -> status_surat == "Surat Tervalidasi Kepala Unit"){
            $akses = "";
        } else{
            $akses = "hidden";
        }

        return view('sekretariat.detail_arsip_surat_keluar', compact('suratkeluar'),
        [
            'suratkeluar' => $suratkeluar,
            'users' => $users,
            'unit' => $unit,
            'kategori' => $kategori,
            'sifat' => $sifat,
            'akses' => $akses,
            'lampiran_1' => $lampiran_1,
            'lampiran_2' => $lampiran_2,
            'lampiran_3' => $lampiran_3,
        ]);
    }
    public function ViewEditArsipSuratMasuk($id){
        $suratMasuk = SuratMasuk::find($id);
        $kategori_surat = Kategori::all();
        $unit = Unit::all();
        return view('sekretariat.edit_arsip_surat_masuk', compact('suratMasuk'),[
            'suratMasuk' => $suratMasuk,
            'kategori_surat' => $kategori_surat,
            'unit' => $unit,
        ]);
    }
    public function ViewEditArsipSuratKeluar($id){
        $suratKeluar = SuratKeluar::find($id);
        $kategori_surat = Kategori::all();
        $unit = Unit::all();
        $year = date('Y');

        return view('sekretariat.edit_arsip_surat_keluar', compact('suratKeluar'),[
            'suratMasuk' => $suratKeluar,
            'kategori_surat' => $kategori_surat,
            'unit' => $unit,
            'year' => $year,
        ]);
    }
    public function EditArsipSuratMasuk($id, Request $request){
        $suratMasuk = SuratMasuk::find($id);
        $suratMasuk -> id_kategori_surat = $request -> id_kategori_surat;
        $suratMasuk -> id_unit = $request -> id_unit;
        $suratMasuk -> pengirim = $request -> pengirim;
        $suratMasuk -> penerima = $request -> penerima;
        $suratMasuk -> subjek = $request -> subjek;
        $suratMasuk -> catatan = $request -> catatan;
        $suratMasuk -> lampiran_1 = $request -> lampiran_1;
        $suratMasuk -> lampiran_2 = $request -> lampiran_2;
        $suratMasuk -> lampiran_3 = $request -> lampiran_3;
        $suratMasuk -> save();
        Alert::toast('Update Data Arsip Surat Masuk Berhasil!','success');
        return redirect(route('ListArsipSuratMasuk_sekretariat'));
    }
    public function EditArsipSuratKeluar($id, Request $request){
        $suratKeluar = SuratKeluar::find($id);
        $kode_kategori = $request->id_kategori_surat;
        $no_urut = $request->no_urut;
        $id_unit = $request->id_unit;
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $kode_surat = $kode_kategori.".".$no_urut."/".$id_unit."/".$bulan."/".$tahun;

        $suratKeluar -> id_kategori_surat = $kode_kategori;
        $suratKeluar -> id_unit = $id_unit;
        $suratKeluar -> kode_surat = $kode_surat;
        $suratKeluar -> pengirim = $request -> pengirim;
        $suratKeluar -> penerima = $request -> penerima;
        $suratKeluar -> subjek = $request -> subjek;
        $suratKeluar -> catatan = $request -> catatan;
        $suratKeluar -> lampiran_1 = $request -> lampiran_1;
        $suratKeluar -> lampiran_2 = $request -> lampiran_2;
        $suratKeluar -> lampiran_3 = $request -> lampiran_3;
        $suratKeluar -> save();
        Alert::toast('Update Data Arsip Surat Keluar Berhasil!','success');
        return redirect(route('ListArsipSuratKeluar_sekretariat'));
    }
    
    public function HapusArsipSuratMasuk($id){
        $suratMasuk = SuratMasuk::find($id);
        $suratMasuk -> delete();
        Alert::toast('Data Arsip Surat Masuk Berhasil dihapus!','success');
        return Redirect::back();
    }
    public function HapusArsipSuratKeluar($id){
        $suratKeluar = SuratKeluar::find($id);
        $suratKeluar -> delete();
        Alert::toast('Data Arsip Surat Keluar Berhasil dihapus!','success');
        return Redirect::back();
    }
    public function ListArsipSuratMasuk(){
        $suratMasuk = SuratMasuk::orderBy('id', 'DESC')->paginate(25);
        $date = date('D, d M Y');

        return view('sekretariat.list_arsip_surat_masuk',
        [
            'suratMasuk' => $suratMasuk,
            'date' => $date,
        ]);
    }

    public function ListArsipSuratKeluar(){
        $suratKeluar = SuratKeluar::orderBy('id', 'DESC')->paginate(25);
        $date = date('D, d M Y');

        return view('sekretariat.list_arsip_surat_keluar',
        [
            'suratKeluar' => $suratKeluar,
            'date' => $date,
        ]);
    }
    public function DisposisiSuratMasuk(Request $request){
        $catatan = $request->catatan;

        $dom = new DOMDocument();
        $dom->loadHTML($catatan,9);
        $catatan = $dom->saveHTML();
        $status_disposisi = "Disposisi Terkirim";

        disposisiSuratMasuk::create([
            'id_sifat_surat' => $request -> id_sifat_surat,
            'id_surat_masuk' => $request -> id_surat_masuk,
            'pengirim' => $request -> pengirim,
            'penerima' => $request -> penerima,
            'catatan' => $catatan,
            'lampiran_1' => $request -> lampiran_1,
            'lampiran_2' => $request -> lampiran_2,
            'lampiran_3' => $request -> lampiran_3,
            'status_Disposisi' => $status_disposisi,
        ]);
        Alert::toast('Surat Berhasil Disposisi','success');
        return Redirect::back();
    }

    public function DisposisiSuratKeluar(Request $request){
        $catatan = $request->catatan;

        $dom = new DOMDocument();
        $dom->loadHTML($catatan,9);
        $catatan = $dom->saveHTML();
        $status_disposisi = "Disposisi Terkirim";

        disposisiSuratKeluar::create([
            'id_sifat_surat' => $request -> id_sifat_surat,
            'id_surat_keluar' => $request -> id_surat_keluar,
            'pengirim' => $request -> pengirim,
            'penerima' => $request -> penerima,
            'catatan' => $catatan,
            'lampiran_1' => $request -> lampiran_1,
            'lampiran_2' => $request -> lampiran_2,
            'lampiran_3' => $request -> lampiran_3,
            'status_Disposisi' => $status_disposisi,
        ]);
        Alert::toast('Surat Berhasil Disposisi','success');
        return Redirect::back();
    }

    public function ListArsipDisposisiSuratMasuk(){
        $disposisiSuratMasuk = disposisiSuratMasuk::orderBy('id', 'DESC')->paginate(25);
        $date = date('D, d M Y');

        return view('sekretariat.list_arsip_disposisi_surat_masuk',
        [
            'disposisiSuratMasuk' => $disposisiSuratMasuk,
            'date' => $date,
        ]);
    }

    public function ListArsipDisposisiSuratKeluar(){
        $disposisiSuratKeluar = disposisiSuratKeluar::orderBy('id', 'DESC')->paginate(25);
        $date = date('D, d M Y');

        return view('sekretariat.list_arsip_disposisi_surat_keluar',
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
        $penerima = Auth::user()->email;
        if(($disposisiSuratMasuk -> status_disposisi == "Surat Telah Ditindak Lanjut") || ($disposisiSuratMasuk->penerima != $penerima)){
            $validasi = "hidden";
        } else{
            $validasi = "";
        }

        return view('sekretariat.detail_arsip_disposisi_surat_masuk', compact('disposisiSuratMasuk'),
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

        $penerima = Auth::user()->email;
        if(($disposisiSuratKeluar -> status_disposisi == "Surat Telah Ditindak Lanjut") || ($disposisiSuratKeluar->penerima != $penerima)){
            $validasi = "hidden";
        } else{
            $validasi = "";
        }

        return view('sekretariat.detail_arsip_disposisi_surat_keluar', compact('disposisiSuratKeluar'),
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

    public function FilterSuratMasuk(Request $request){
        $filter_surat_masuk = $request->filter_surat_masuk;

        $suratMasuk = SuratMasuk::whereDate('created_at', $filter_surat_masuk)->get();
        return view('sekretariat.list_arsip_surat_masuk_filter', compact('suratMasuk'),[
            'suratMasuk' => $suratMasuk,
        ]);
    }
    public function FilterSuratKeluar(Request $request){
        $filter_surat_keluar = $request->filter_surat_keluar;

        $suratKeluar = SuratKeluar::whereDate('created_at', $filter_surat_keluar)->get();
        return view('sekretariat.list_arsip_surat_keluar_filter', compact('suratKeluar'),[
            'suratMasuk' => $suratKeluar,
        ]);
    }

    public function FilterDisposisiSuratMasuk(Request $request){
        $filter_disposisi_surat_masuk = $request->filter_disposisi_surat_masuk;

        $disposisiSuratMasuk = disposisiSuratMasuk::whereDate('created_at', $filter_disposisi_surat_masuk)->get();
        return view('sekretariat.list_arsip_disposisi_surat_masuk_filter', compact('disposisiSuratMasuk'),[
            'disposisiSuratMasuk' => $disposisiSuratMasuk,
        ]);
    }
    public function FilterDisposisiSuratKeluar(Request $request){
        $filter_disposisi_surat_keluar = $request->filter_disposisi_surat_keluar;

        $disposisiSuratKeluar = disposisiSuratKeluar::whereDate('created_at', $filter_disposisi_surat_keluar)->get();
        return view('sekretariat.list_arsip_disposisi_surat_keluar_filter', compact('disposisiSuratKeluar'),[
            'disposisiSuratKeluar' => $disposisiSuratKeluar,
        ]);
    }
}
