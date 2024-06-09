@extends('layouts.main')
@section('web_title', 'Detail Arsip Surat Sekretariat')
@section('menu')
    @include('layouts.menu.dosen_staff')
@endsection
@section('content_tittle', 'Detail Arsip Surat Keluar')
@section('content')
<div>
    <div class="flex gap-5 mb-3">
        <a href="{{ URL::previous() }}">
            <button class="p-2 bg-slate-600 text-white rounded-md text-[18px] my-auto">
                <i class="fas fa-angle-double-left text-[18px] my-auto"></i> Kembali
            </button>
        </a>
        <p class="ml-auto my-auto font-bold">Waktu Surat diarsip: {{ ($suratkeluar -> created_at)->format('D, d M Y, H:i') }} WIB</p>
    </div>
    <div class="flex gap-3">
        <div class="w-full">
            {{-- catatan surat --}}
            <div class="bg-white border shadow p-4 rounded-md">
                {!! $suratkeluar->catatan !!}
            </div>
        </div>
        @php
        // Nama Kategori
        foreach ($suratkeluar as $kat) {
                    $id_kat = $suratkeluar -> id_kategori_surat;
                    foreach ($kategori as $kat) {
                        if ($id_kat == $kat -> id) {
                            $nama_kat = $kat -> kategori_surat;
                        }
                    }
                }
                // Nama unit
                foreach ($suratkeluar as $unt) {
                    $id_un = $suratkeluar -> id_unit;
                    foreach ($unit as $unt) {
                        if ($id_un == $unt -> id) {
                            $nama_unt = $unt -> unit;
                        }
                    }
                }
                // Nama pengirim                
                foreach ($suratkeluar as $sm) {
                    $surat_keluar = $suratkeluar -> pengirim;
                    foreach ($users as $u) {
                        if ($surat_keluar == $u -> email) {
                            $pengirim = $u -> nama;
                        }
                    }
                }
                // Nama unit penerima                
                foreach ($suratkeluar as $unt_pen) {
                    $unt = $suratkeluar -> id_kategori_surat;
                    foreach ($unit as $unt_pen) {
                        if ($unt == $unt_pen -> id) {
                            $unit_penerima = $unt_pen -> kategori_surat;
                        }
                    }
                }
        @endphp
        <div class="bg-white border rounded-md shadow p-4 w-[700px]">
            <p class="font-bold text-[18px]">
                <i class="fas fa-info-circle"></i>
                Deskripsi Surat
            </p>
            <hr class="my-2">
            <div>
                <div class="w-full my-4">
                    <label class="font-normal">Subjek</label>
                    <p class="font-semibold break-words">{{$suratkeluar -> subjek}}</p>
                </div>
                <hr>
                <div class="my-2">
                    <label class="font-normal">Unit Penerima</label>
                    <p class="font-semibold break-words">{{$unit_penerima}}</p>
                </div>
                <div class="my-2">
                    <label class="font-normal">Kategori Surat</label>
                    <p class="font-semibold break-words">{{$nama_kat}}</p>
                </div>
                <div class="w-full grid grid-cols-2 gap-4 mb-2">
                    <div class="">
                        <label class="font-normal">Unit</label>
                        <p class="font-semibold break-words">{{$nama_unt}}</p>
                    </div>
                    <div class="text-right">
                        <label class="font-normal">Pengirim Surat</label>
                        <p class="font-semibold break-words">{{$suratkeluar -> pengirim}}</p>
                        <p class="font-semibold break-words">{{$pengirim}}</p>
                    </div>
                </div>
                <div class="w-full my-4">
                    <label class="font-normal">Status Surat</label>
                    <p class="font-semibold break-words">{{$suratkeluar -> status_surat}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5">
        <embed class="w-[100%] h-[100%] min-h-[800px] desktop:min-h-[1000px] rounded-md" src="../assets/arsip/{{$suratkeluar -> lampiran_1}}" {{$lampiran_1}}>
    </div>
    <div class="mt-5">
        <embed class="w-[100%] h-[100%] min-h-[800px] desktop:min-h-[1000px] rounded-md" src="../assets/arsip/{{$suratkeluar -> lampiran_2}}" {{$lampiran_2}}>
    </div>
    <div class="mt-5">
        <embed class="w-[100%] h-[100%] min-h-[800px] desktop:min-h-[1000px] rounded-md" src="../assets/arsip/{{$suratkeluar -> lampiran_3}}" {{$lampiran_3}}>
    </div>
</div>
@endsection