@extends('layouts.main')
@section('web_title', 'Detail Arsip Disposisi Surat Kepala Unit')
@section('menu')
    @include('layouts.menu.sekretariat')
@endsection
@section('content_tittle', 'Detail Arsip Disposisi Surat Keluar')
@section('content')
<div>
    <div class="flex gap-5 mb-3">
        <a href="{{ route('ListArsipDisposisiSuratKeluar_sekretariat') }}">
            <button class="p-2 bg-slate-600 text-white rounded-md text-[18px] my-auto">
                <i class="fas fa-angle-double-left text-[18px] my-auto"></i> Kembali
            </button>
        </a>
        <p class="ml-auto my-auto font-bold">Waktu Surat diarsip: {{($disposisiSuratKeluar -> created_at)->format('D, d M Y, H:i')}} WIB</p>
    </div>
    <div class="flex gap-3">
        <div class="w-full">
            {{-- catatan surat --}}
            <div class="bg-white border shadow p-4 rounded-md">
                {!! $disposisiSuratKeluar->catatan !!}
            </div>
        </div>
        @php
            foreach ($suratKeluar as $kat) {
                $id_kat = $suratKeluar -> id_kategori_surat;
                foreach ($kategori_surat as $kat) {
                    if ($id_kat == $kat -> id) {
                        $nama_kat = $kat -> kategori_surat;
                    }
                }
            }
            foreach ($suratKeluar as $unt) {
                $id_un = $suratKeluar -> id_unit;
                foreach ($unit as $unt) {
                    if ($id_un == $unt -> id) {
                        $nama_unt = $unt -> unit;
                    }
                }
            }
            foreach ($disposisiSuratKeluar as $dsm) {
                $id_sifat = $disposisiSuratKeluar -> id_sifat_surat;
                foreach ($sifat as $sft) {
                    if ($id_sifat == $sft -> id) {
                        $sifat_surat = $sft -> sifat_surat;
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
                <div class="my-2">
                    <label class="font-normal">Sifat Disposisi Surat</label>
                    <p class="font-semibold break-words">Disposisi {{$sifat_surat}}</p>
                </div>
                <hr>
                <div class="grid grid-cols-2 gap-4">
                    <div class="my-2">
                        <label class="font-normal">Kategori Surat Masuk</label>
                        <p class="font-semibold break-words">{{$nama_kat}}</p>
                    </div>
                    <div class="my-2 text-right">
                        <label class="font-normal">Unit</label>
                        <p class="font-semibold break-words">{{$nama_unt}}</p>
                    </div>
                </div>
                <div class="my-2">
                    <label class="font-normal">Subjek Surat Masuk</label>
                    <p class="font-semibold break-words">{{$suratKeluar -> subjek}}</p>
                </div>
                <div class="grid grid-cols-2 gap-1">
                    <div class="w-full my-4">
                        <label class="font-normal">Pengirim Surat</label>
                        <p class="font-semibold break-words">{{$disposisiSuratKeluar -> pengirim}}</p>
                        <p class="font-semibold break-words"></p>
                    </div>
                    <div class="w-full my-4 text-right">
                        <label class="font-normal">Penerima Surat</label>
                        <p class="font-semibold break-words">{{$disposisiSuratKeluar -> penerima}}</p>
                        <p class="font-semibold break-words"></p>
                    </div>
                </div>
                <div class="w-full my-4">
                    <label class="font-normal">Status Surat</label>
                    <p class="font-semibold break-words">{{$disposisiSuratKeluar -> status_disposisi}}</p>
                </div>
                <hr {{$validasi}}>
                <div class="my-3">
                    <a href="/Sekretariat/TindakLanjutDetailArsipDisposisiSuratKeluar-{{ $disposisiSuratKeluar -> id }}">
                        <button class="bg-blue-700 p-3 rounded text-white font-semibold m-auto w-full hover:bg-blue-600" onclick="return confirm('Apakah Surat akan ditindak lanjut?')" {{$validasi}}>Tindak Lanjut Surat</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5">
        <embed class="w-[100%] h-[100%] min-h-[800px] desktop:min-h-[1000px] rounded-md" src="../assets/arsip/{{$disposisiSuratKeluar -> lampiran_1}}" {{$lampiran_1}}>
    </div>
    <div class="mt-5">
        <embed class="w-[100%] h-[100%] min-h-[800px] desktop:min-h-[1000px] rounded-md" src="../assets/arsip/{{$disposisiSuratKeluar -> lampiran_2}}" {{$lampiran_2}}>
    </div>
    <div class="mt-5">
        <embed class="w-[100%] h-[100%] min-h-[800px] desktop:min-h-[1000px] rounded-md" src="../assets/arsip/{{$disposisiSuratKeluar -> lampiran_3}}" {{$lampiran_3}}>
    </div>
</div>
@endsection