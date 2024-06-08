@extends('layouts.main')
@section('web_title', 'Detail Arsip Surat Sekretariat')
@section('menu')
    @include('layouts.menu.dosen_staff')
@endsection
@section('content_tittle', 'Detail Arsip Surat Masuk')
@section('content')
<div>
    <div class="flex gap-5 mb-3">
        <a href="{{ URL::previous() }}">
            <button class="p-2 bg-slate-600 text-white rounded-md text-[18px] my-auto">
                <i class="fas fa-angle-double-left text-[18px] my-auto"></i> Kembali
            </button>
        </a>
        <p class="ml-auto my-auto font-bold">Waktu Surat diarsip: {{ ($suratMasuk -> created_at)->format('D, d M Y, H:i') }} WIB</p>
    </div>
    <div class="flex gap-3">
        <div class="w-full">
            {{-- catatan surat --}}
            <div class="bg-white border shadow p-4 rounded-md">
                {!! $suratMasuk->catatan !!}
            </div>
        </div>
        @php
        // Nama Kategori
        foreach ($suratMasuk as $kat) {
                    $id_kat = $suratMasuk -> id_kategori_surat;
                    foreach ($kategori_surat as $kat) {
                        if ($id_kat == $kat -> id) {
                            $nama_kat = $kat -> kategori_surat;
                        }
                    }
                }
                // Nama unit
                foreach ($suratMasuk as $unt) {
                    $id_un = $suratMasuk -> id_unit;
                    foreach ($unit as $unt) {
                        if ($id_un == $unt -> id) {
                            $nama_unt = $unt -> unit;
                        }
                    }
                }
                // Nama pengirim                
                foreach ($suratMasuk as $sm) {
                    $surat_masuk = $suratMasuk -> pengirim;
                    foreach ($users as $u) {
                        if ($surat_masuk == $u -> email) {
                            $pengirim = $u -> nama;
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
                    <p class="font-semibold break-words">{{$suratMasuk -> subjek}}</p>
                </div>
                <hr>
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
                        <p class="font-semibold break-words">{{$suratMasuk -> pengirim}}</p>
                        <p class="font-semibold break-words">{{$pengirim}}</p>
                    </div>
                </div>
                <div class="w-full my-4">
                    <label class="font-normal">Status Surat</label>
                    <p class="font-semibold break-words">{{$suratMasuk -> status_surat}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5">
        <embed class="w-[100%] h-[100%] min-h-[800px] desktop:min-h-[1000px] rounded-md" src="../assets/arsip/{{$suratMasuk -> lampiran_1}}" {{$lampiran_1}}>
    </div>
    <div class="mt-5">
        <embed class="w-[100%] h-[100%] min-h-[800px] desktop:min-h-[1000px] rounded-md" src="../assets/arsip/{{$suratMasuk -> lampiran_2}}" {{$lampiran_2}}>
    </div>
    <div class="mt-5">
        <embed class="w-[100%] h-[100%] min-h-[800px] desktop:min-h-[1000px] rounded-md" src="../assets/arsip/{{$suratMasuk -> lampiran_3}}" {{$lampiran_3}}>
    </div>
</div>
@endsection