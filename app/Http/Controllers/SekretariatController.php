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
        $tgl = date('l, d F Y');
        $bulan = date('F');
        $tahun = date('Y');
        $penerima = Auth::user()->email;
        $status_surat ="Surat Tervalidasi Kepala Unit";
        // count per hari ini
        $suratMasuk_count_day = SuratMasuk::whereDate('created_at', date('Y-m-d'))->count();
        $suratKeluar_count_day = SuratKeluar::whereDate('created_at', date('Y-m-d'))->count();
        $disposisiSuratMasuk_count_day = disposisiSuratMasuk::whereDate('created_at', date('Y-m-d'))->count();
        $disposisiSuratKeluar_count_day = disposisiSuratKeluar::whereDate('created_at', date('Y-m-d'))->count();
        
        // count per bulan        
        $suratMasuk_count_Jan = SuratMasuk::whereMonth('created_at', date('01'))->whereYear('created_at', now()->year)->count();
        $suratMasuk_count_Feb = SuratMasuk::whereMonth('created_at', date('02'))->whereYear('created_at', now()->year)->count();
        $suratMasuk_count_Mar = SuratMasuk::whereMonth('created_at', date('03'))->whereYear('created_at', now()->year)->count();
        $suratMasuk_count_Apr = SuratMasuk::whereMonth('created_at', date('04'))->whereYear('created_at', now()->year)->count();
        $suratMasuk_count_Mei = SuratMasuk::whereMonth('created_at', date('05'))->whereYear('created_at', now()->year)->count();
        $suratMasuk_count_Jun = SuratMasuk::whereMonth('created_at', date('06'))->whereYear('created_at', now()->year)->count();
        $suratMasuk_count_Jul = SuratMasuk::whereMonth('created_at', date('07'))->whereYear('created_at', now()->year)->count();
        $suratMasuk_count_Aug = SuratMasuk::whereMonth('created_at', date('08'))->whereYear('created_at', now()->year)->count();
        $suratMasuk_count_Sep = SuratMasuk::whereMonth('created_at', date('09'))->whereYear('created_at', now()->year)->count();
        $suratMasuk_count_Okt = SuratMasuk::whereMonth('created_at', date('10'))->whereYear('created_at', now()->year)->count();
        $suratMasuk_count_Nov = SuratMasuk::whereMonth('created_at', date('11'))->whereYear('created_at', now()->year)->count();
        $suratMasuk_count_Des = SuratMasuk::whereMonth('created_at', date('12'))->whereYear('created_at', now()->year)->count();

        $suratKeluar_count_Jan = SuratKeluar::whereMonth('created_at', date('01'))->whereYear('created_at', now()->year)->count();
        $suratKeluar_count_Feb = SuratKeluar::whereMonth('created_at', date('02'))->whereYear('created_at', now()->year)->count();
        $suratKeluar_count_Mar = SuratKeluar::whereMonth('created_at', date('03'))->whereYear('created_at', now()->year)->count();
        $suratKeluar_count_Apr = SuratKeluar::whereMonth('created_at', date('04'))->whereYear('created_at', now()->year)->count();
        $suratKeluar_count_Mei = SuratKeluar::whereMonth('created_at', date('05'))->whereYear('created_at', now()->year)->count();
        $suratKeluar_count_Jun = SuratKeluar::whereMonth('created_at', date('06'))->whereYear('created_at', now()->year)->count();
        $suratKeluar_count_Jul = SuratKeluar::whereMonth('created_at', date('07'))->whereYear('created_at', now()->year)->count();
        $suratKeluar_count_Aug = SuratKeluar::whereMonth('created_at', date('08'))->whereYear('created_at', now()->year)->count();
        $suratKeluar_count_Sep = SuratKeluar::whereMonth('created_at', date('09'))->whereYear('created_at', now()->year)->count();
        $suratKeluar_count_Okt = SuratKeluar::whereMonth('created_at', date('10'))->whereYear('created_at', now()->year)->count();
        $suratKeluar_count_Nov = SuratKeluar::whereMonth('created_at', date('11'))->whereYear('created_at', now()->year)->count();
        $suratKeluar_count_Des = SuratKeluar::whereMonth('created_at', date('12'))->whereYear('created_at', now()->year)->count();

        $disposisiSuratMasuk_count_Jan = disposisiSuratMasuk::whereMonth('created_at', date('01'))->whereYear('created_at', now()->year)->count();
        $disposisiSuratMasuk_count_Feb = disposisiSuratMasuk::whereMonth('created_at', date('02'))->whereYear('created_at', now()->year)->count();
        $disposisiSuratMasuk_count_Mar = disposisiSuratMasuk::whereMonth('created_at', date('03'))->whereYear('created_at', now()->year)->count();
        $disposisiSuratMasuk_count_Apr = disposisiSuratMasuk::whereMonth('created_at', date('04'))->whereYear('created_at', now()->year)->count();
        $disposisiSuratMasuk_count_Mei = disposisiSuratMasuk::whereMonth('created_at', date('05'))->whereYear('created_at', now()->year)->count();
        $disposisiSuratMasuk_count_Jun = disposisiSuratMasuk::whereMonth('created_at', date('06'))->whereYear('created_at', now()->year)->count();
        $disposisiSuratMasuk_count_Jul = disposisiSuratMasuk::whereMonth('created_at', date('07'))->whereYear('created_at', now()->year)->count();
        $disposisiSuratMasuk_count_Aug = disposisiSuratMasuk::whereMonth('created_at', date('08'))->whereYear('created_at', now()->year)->count();
        $disposisiSuratMasuk_count_Sep = disposisiSuratMasuk::whereMonth('created_at', date('09'))->whereYear('created_at', now()->year)->count();
        $disposisiSuratMasuk_count_Okt = disposisiSuratMasuk::whereMonth('created_at', date('10'))->whereYear('created_at', now()->year)->count();
        $disposisiSuratMasuk_count_Nov = disposisiSuratMasuk::whereMonth('created_at', date('11'))->whereYear('created_at', now()->year)->count();
        $disposisiSuratMasuk_count_Des = disposisiSuratMasuk::whereMonth('created_at', date('12'))->whereYear('created_at', now()->year)->count();

        $disposisiSuratKeluar_count_Jan = disposisiSuratKeluar::whereMonth('created_at', date('01'))->whereYear('created_at', now()->year)->count();
        $disposisiSuratKeluar_count_Feb = disposisiSuratKeluar::whereMonth('created_at', date('02'))->whereYear('created_at', now()->year)->count();
        $disposisiSuratKeluar_count_Mar = disposisiSuratKeluar::whereMonth('created_at', date('03'))->whereYear('created_at', now()->year)->count();
        $disposisiSuratKeluar_count_Apr = disposisiSuratKeluar::whereMonth('created_at', date('04'))->whereYear('created_at', now()->year)->count();
        $disposisiSuratKeluar_count_Mei = disposisiSuratKeluar::whereMonth('created_at', date('05'))->whereYear('created_at', now()->year)->count();
        $disposisiSuratKeluar_count_Jun = disposisiSuratKeluar::whereMonth('created_at', date('06'))->whereYear('created_at', now()->year)->count();
        $disposisiSuratKeluar_count_Jul = disposisiSuratKeluar::whereMonth('created_at', date('07'))->whereYear('created_at', now()->year)->count();
        $disposisiSuratKeluar_count_Aug = disposisiSuratKeluar::whereMonth('created_at', date('08'))->whereYear('created_at', now()->year)->count();
        $disposisiSuratKeluar_count_Sep = disposisiSuratKeluar::whereMonth('created_at', date('09'))->whereYear('created_at', now()->year)->count();
        $disposisiSuratKeluar_count_Okt = disposisiSuratKeluar::whereMonth('created_at', date('10'))->whereYear('created_at', now()->year)->count();
        $disposisiSuratKeluar_count_Nov = disposisiSuratKeluar::whereMonth('created_at', date('11'))->whereYear('created_at', now()->year)->count();
        $disposisiSuratKeluar_count_Des = disposisiSuratKeluar::whereMonth('created_at', date('12'))->whereYear('created_at', now()->year)->count();

        // count per tahun
        $suratMasuk_count = SuratMasuk::whereYear('created_at', now()->year)->count();
        $suratKeluar_count = SuratKeluar::whereYear('created_at', now()->year)->count();
        $disposisiSuratMasuk_count = disposisiSuratMasuk::whereYear('created_at', now()->year)->count();
        $disposisiSuratKeluar_count = disposisiSuratKeluar::whereYear('created_at', now()->year)->count();
        $all_year = $suratMasuk_count + $suratKeluar_count + $disposisiSuratMasuk_count + $disposisiSuratKeluar_count;
        $suratMasuk_count_yaer = ($suratMasuk_count / $all_year)*(1/100);
        $suratKeluar_count_yaer = ($suratKeluar_count / $all_year)*(1/100);
        $disposisiSuratMasuk_count_yaer = ($disposisiSuratMasuk_count / $all_year)*(1/100);
        $disposisiSuratKeluar_count_yaer = ($disposisiSuratKeluar_count / $all_year)*(1/100);

        $suratMasuk_day = SuratMasuk::whereDate('created_at', date('Y-m-d'))->where('penerima', $penerima)->where('status_surat', $status_surat)->paginate(5);
        $suratKeluar_day = SuratKeluar::whereDate('created_at', date('Y-m-d'))->where('penerima', $penerima)->where('status_surat', $status_surat)->paginate(5);
        $disposisiSuratMasuk_day = disposisiSuratMasuk::whereDate('created_at', date('Y-m-d'))->where('penerima', $penerima)->paginate(5);
        $disposisiSuratKeluar_day = disposisiSuratKeluar::whereDate('created_at', date('Y-m-d'))->where('penerima', $penerima)->paginate(5);


        return view('sekretariat.dashboard',[
            'tgl' => $tgl,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'suratMasuk_count_day' => $suratMasuk_count_day,
            'suratKeluar_count_day' => $suratKeluar_count_day,
            'disposisiSuratMasuk_count_day' => $disposisiSuratMasuk_count_day,
            'disposisiSuratKeluar_count_day' => $disposisiSuratKeluar_count_day,
            'suratMasuk_count_yaer' => $suratMasuk_count_yaer,
            'suratKeluar_count_yaer' => $suratKeluar_count_yaer,
            'disposisiSuratMasuk_count_yaer' => $disposisiSuratMasuk_count_yaer,
            'disposisiSuratKeluar_count_yaer' => $disposisiSuratKeluar_count_yaer,
            'suratMasuk_count_Jan' => $suratMasuk_count_Jan,
            'suratMasuk_count_Feb' => $suratMasuk_count_Feb,
            'suratMasuk_count_Mar' => $suratMasuk_count_Mar,
            'suratMasuk_count_Apr' => $suratMasuk_count_Apr,
            'suratMasuk_count_Mei' => $suratMasuk_count_Mei,
            'suratMasuk_count_Jun' => $suratMasuk_count_Jun,
            'suratMasuk_count_Jul' => $suratMasuk_count_Jul,
            'suratMasuk_count_Aug' => $suratMasuk_count_Aug,
            'suratMasuk_count_Sep' => $suratMasuk_count_Sep,
            'suratMasuk_count_Okt' => $suratMasuk_count_Okt,
            'suratMasuk_count_Nov' => $suratMasuk_count_Nov,
            'suratMasuk_count_Des' => $suratMasuk_count_Des,
            'suratKeluar_count_Jan' => $suratKeluar_count_Jan,
            'suratKeluar_count_Feb' => $suratKeluar_count_Feb,
            'suratKeluar_count_Mar' => $suratKeluar_count_Mar,
            'suratKeluar_count_Apr' => $suratKeluar_count_Apr,
            'suratKeluar_count_Mei' => $suratKeluar_count_Mei,
            'suratKeluar_count_Jun' => $suratKeluar_count_Jun,
            'suratKeluar_count_Jul' => $suratKeluar_count_Jul,
            'suratKeluar_count_Aug' => $suratKeluar_count_Aug,
            'suratKeluar_count_Sep' => $suratKeluar_count_Sep,
            'suratKeluar_count_Okt' => $suratKeluar_count_Okt,
            'suratKeluar_count_Nov' => $suratKeluar_count_Nov,
            'suratKeluar_count_Des' => $suratKeluar_count_Des,
            'disposisiSuratMasuk_count_Jan' => $disposisiSuratMasuk_count_Jan,
            'disposisiSuratMasuk_count_Feb' => $disposisiSuratMasuk_count_Feb,
            'disposisiSuratMasuk_count_Mar' => $disposisiSuratMasuk_count_Mar,
            'disposisiSuratMasuk_count_Apr' => $disposisiSuratMasuk_count_Apr,
            'disposisiSuratMasuk_count_Mei' => $disposisiSuratMasuk_count_Mei,
            'disposisiSuratMasuk_count_Jun' => $disposisiSuratMasuk_count_Jun,
            'disposisiSuratMasuk_count_Jul' => $disposisiSuratMasuk_count_Jul,
            'disposisiSuratMasuk_count_Aug' => $disposisiSuratMasuk_count_Aug,
            'disposisiSuratMasuk_count_Sep' => $disposisiSuratMasuk_count_Sep,
            'disposisiSuratMasuk_count_Okt' => $disposisiSuratMasuk_count_Okt,
            'disposisiSuratMasuk_count_Nov' => $disposisiSuratMasuk_count_Nov,
            'disposisiSuratMasuk_count_Des' => $disposisiSuratMasuk_count_Des,
            'disposisiSuratKeluar_count_Jan' => $disposisiSuratKeluar_count_Jan,
            'disposisiSuratKeluar_count_Feb' => $disposisiSuratKeluar_count_Feb,
            'disposisiSuratKeluar_count_Mar' => $disposisiSuratKeluar_count_Mar,
            'disposisiSuratKeluar_count_Apr' => $disposisiSuratKeluar_count_Apr,
            'disposisiSuratKeluar_count_Mei' => $disposisiSuratKeluar_count_Mei,
            'disposisiSuratKeluar_count_Jun' => $disposisiSuratKeluar_count_Jun,
            'disposisiSuratKeluar_count_Jul' => $disposisiSuratKeluar_count_Jul,
            'disposisiSuratKeluar_count_Aug' => $disposisiSuratKeluar_count_Aug,
            'disposisiSuratKeluar_count_Sep' => $disposisiSuratKeluar_count_Sep,
            'disposisiSuratKeluar_count_Okt' => $disposisiSuratKeluar_count_Okt,
            'disposisiSuratKeluar_count_Nov' => $disposisiSuratKeluar_count_Nov,
            'disposisiSuratKeluar_count_Des' => $disposisiSuratKeluar_count_Des,
            'suratMasuk_day' => $suratMasuk_day,
            'suratKeluar_day' => $suratKeluar_day,
            'disposisiSuratMasuk_day' => $disposisiSuratMasuk_day,
            'disposisiSuratKeluar_day' => $disposisiSuratKeluar_day,
        ]);
    }
    public function ViewArsipSurat(){
        $kategori_surat = Kategori::all();
        $unit = Unit::all();
        $date = date('l, d M Y');
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
            'unit_penerima' => $request -> unit_penerima,
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
        $suratMasuk = SuratMasuk::orderBy('id', 'DESC')->whereYear('created_at', now()->year)->paginate(25);
        $date = date('D, d M Y');

        return view('sekretariat.list_arsip_surat_masuk',
        [
            'suratMasuk' => $suratMasuk,
            'date' => $date,
        ]);
    }

    public function ListArsipSuratKeluar(){
        $suratKeluar = SuratKeluar::orderBy('id', 'DESC')->whereYear('created_at', now()->year)->paginate(25);
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
            'status_disposisi' => $status_disposisi,
        ]);
        Alert::toast('Surat Berhasil Disposisi','success');
        return Redirect::back();
    }

    public function ListArsipDisposisiSuratMasuk(){
        $disposisiSuratMasuk = disposisiSuratMasuk::orderBy('id', 'DESC')->whereYear('created_at', now()->year)->paginate(25);
        $date = date('D, d M Y');

        return view('sekretariat.list_arsip_disposisi_surat_masuk',
        [
            'disposisiSuratMasuk' => $disposisiSuratMasuk,
            'date' => $date,
        ]);
    }

    public function ListArsipDisposisiSuratKeluar(){
        $disposisiSuratKeluar = disposisiSuratKeluar::orderBy('id', 'DESC')->whereYear('created_at', now()->year)->paginate(25);
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

    public function HapusArsipDisposisiSuratMasuk($id){
        $disposisiSuratMasuk = disposisiSuratMasuk::find($id);
        $disposisiSuratMasuk -> delete();
        Alert::toast('Data Arsip Disposisi Surat Masuk Berhasil dihapus!','success');
        return Redirect::back();
    }
    public function HapusArsipDisposisiSuratKeluar($id){
        $disposisiSuratKeluar = disposisiSuratKeluar::find($id);
        $disposisiSuratKeluar -> delete();
        Alert::toast('Data Arsip Disposisi Surat Keluar Berhasil dihapus!','success');
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

    public function HapusSemuaArsipSuratMasuk(){
        SuratMasuk::query()->delete();
        Alert::toast('Semua Surat Masuk berhasil dihapus!','success');
        return Redirect::back(); 
    }
    public function HapusSemuaArsipSuratKeluar(){
        SuratKeluar::query()->delete();
        Alert::toast('Semua Surat Keluar berhasil dihapus!','success');
        return Redirect::back(); 
    }
    public function HapusSemuaDisposisiArsipSuratMasuk(){
        disposisiSuratMasuk::query()->delete();
        Alert::toast('Semua Disposisi Surat Masuk berhasil dihapus!','success');
        return Redirect::back(); 
    }
    public function HapusSemuaDisposisiArsipSuratKeluar(){
        disposisiSuratKeluar::query()->delete();
        Alert::toast('Semua Disposisi Surat Keluar berhasil dihapus!','success');
        return Redirect::back(); 
    }
}
