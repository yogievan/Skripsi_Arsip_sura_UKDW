@extends('layouts.main')
@section('web_title', 'Detail Arsip Disposisi Surat Kepala Unit')
@section('menu')
    @include('layouts.menu.kepala_unit')
@endsection
@section('content_tittle', 'Detail Arsip Disposisi Surat Masuk')
@section('content')
<div>
    <div class="flex gap-5 mb-3">
        <a href="{{ route('ListArsipDisposisiSuratMasuk_kepalaunit') }}">
            <button class="p-2 bg-slate-600 text-white rounded-md text-[18px] my-auto">
                <i class="fas fa-angle-double-left text-[18px] my-auto"></i> Kembali
            </button>
        </a>
        <p class="ml-auto my-auto font-bold">Waktu Surat diarsip: {{($disposisiSuratMasuk -> created_at)->format('D, d M Y, H:i')}} WIB</p>
    </div>
    <div class="flex gap-3">
        <div class="w-full">
            {{-- catatan surat --}}
            <div class="bg-white border shadow p-4 rounded-md">
                {!! $disposisiSuratMasuk->catatan !!}
            </div>
        </div>
        @php
            foreach ($suratMasuk as $kat) {
                $id_kat = $suratMasuk -> id_kategori_surat;
                foreach ($kategori_surat as $kat) {
                    if ($id_kat == $kat -> id) {
                        $nama_kat = $kat -> kategori_surat;
                    }
                }
            }
            foreach ($suratMasuk as $unt) {
                $id_un = $suratMasuk -> id_unit;
                foreach ($unit as $unt) {
                    if ($id_un == $unt -> id) {
                        $nama_unt = $unt -> unit;
                    }
                }
            }
            foreach ($disposisiSuratMasuk as $dsm) {
                $id_sifat = $disposisiSuratMasuk -> id_sifat_surat;
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
                    <p class="font-semibold break-words">{{$suratMasuk -> subjek}}</p>
                </div>
                <div class="grid grid-cols-2 gap-1">
                    <div class="w-full my-4">
                        <label class="font-normal">Pengirim Surat</label>
                        <p class="font-semibold break-words">{{$disposisiSuratMasuk -> pengirim}}</p>
                        <p class="font-semibold break-words"></p>
                    </div>
                    <div class="w-full my-4 text-right">
                        <label class="font-normal">Penerima Surat</label>
                        <p class="font-semibold break-words">{{$disposisiSuratMasuk -> penerima}}</p>
                        <p class="font-semibold break-words"></p>
                    </div>
                </div>
                <div class="w-full my-4">
                    <label class="font-normal">Status Surat</label>
                    <p class="font-semibold break-words">{{$disposisiSuratMasuk -> status_disposisi}}</p>
                </div>
                <hr {{$validasi}}>
                <div class="my-2">
                    <a href="/KepalaUnit/TindakLanjutDetailArsipDisposisiSuratMasuk-{{ $disposisiSuratMasuk -> id }}">
                        <button class="bg-blue-700 p-3 rounded text-white font-semibold m-auto w-full hover:bg-blue-600" onclick="return confirm('Apakah Surat akan ditindak lanjut?')"{{$validasi}}>Tindak Lanjut Surat</button>
                    </a>
                    <button data-modal-target="tambah_disposisi_surat_masuk" data-modal-toggle="tambah_disposisi_surat_masuk" class="bg-[#006B3F] p-3 rounded text-white font-semibold m-auto w-full hover:bg-[#018951] mt-3">Teruskan Surat</button>
                </div>
            </div>
        </div>
        {{-- disposisi surat masuk --}}
        <div id="tambah_disposisi_surat_masuk" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-[1000px] desktop:max-w-[1500px] max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 laptop:p-5 border-b border-[#006B3F] rounded-t">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Teruskan Disposisi Surat Masuk
                        </h3>
                        <button data-modal-hide="tambah_disposisi_surat_masuk" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
    
                    <div class="p-4">
                        <form action="{{route('DisposisiArsipSuratMasuk_kepalaunit')}}" method="POST">
                            @csrf
                            <div class="my-2">
                                <label class="font-semibold">Sifat Surat Disposisi</label>
                                <select name="id_sifat_surat" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" required>
                                    <option value="">Pilih Sifat Surat Disposisi</option>
                                    @foreach ($sifat as $item)
                                        @if ($disposisiSuratMasuk -> id_sifat_surat == $item -> id)
                                            <option selected value="{{ $item -> id }}">{{ $item -> sifat_surat }}</option>
                                        @else
                                            <option value="{{ $item -> id }}">{{ $item -> sifat_surat }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <input name="id_surat_masuk" type="text" value="{{$disposisiSuratMasuk -> id_surat_masuk}}" hidden>
                            <div class="my-2">
                                <label class="font-semibold">Pengirim Surat</label>
                                <input name="pengirim" type="email" value="{{$disposisiSuratMasuk -> pengirim}}" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" readonly>
                            </div>
                            <div class="my-2">
                                <label class="font-semibold">Penerima Surat</label>
                                <input name="penerima" type="email" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" required>
                            </div>
                            <div class="my-2">
                                <textarea id="catatan_disposisi_surat_masuk" name="catatan" class="block bg-white w-full rounded font-normal focus:ring-green-500 focus:border-green-500">
                                    {{$disposisiSuratMasuk -> catatan}}
                                </textarea>
                            </div>
                            <div class="my-2">
                                <label class="font-semibold">Lampiran</label>
                                <input name="lampiran_1" class="block w-[50%] text-sm text-gray-500 border border-[#006B3F] rounded cursor-pointer bg-white focus:outline-none" type="file">
                            </div>
                            <div class="my-2">
                                <input name="lampiran_2" class="block w-[50%] text-sm text-gray-500 border border-[#006B3F] rounded cursor-pointer bg-white focus:outline-none" type="file">
                            </div>
                            <div class="my-2">
                                <input name="lampiran_3" class="block w-[50%] text-sm text-gray-500 border border-[#006B3F] rounded cursor-pointer bg-white focus:outline-none" type="file">
                            </div>
                            <div class="mt-[30px]">
                                <Button class="bg-[#006B3F] p-3 rounded text-white w-[200px] font-semibold hover:bg-[#018951]" onclick="return confirm('Apakah Data telah diisi dengan benar?')">Simpan & Kirim</Button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5">
        <embed class="w-[100%] h-[100%] min-h-[800px] desktop:min-h-[1000px] rounded-md" src="../assets/arsip/{{$disposisiSuratMasuk -> lampiran_1}}" {{$lampiran_1}}>
    </div>
    <div class="mt-5">
        <embed class="w-[100%] h-[100%] min-h-[800px] desktop:min-h-[1000px] rounded-md" src="../assets/arsip/{{$disposisiSuratMasuk -> lampiran_2}}" {{$lampiran_2}}>
    </div>
    <div class="mt-5">
        <embed class="w-[100%] h-[100%] min-h-[800px] desktop:min-h-[1000px] rounded-md" src="../assets/arsip/{{$disposisiSuratMasuk -> lampiran_3}}" {{$lampiran_3}}>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#catatan_disposisi_surat_masuk').summernote({
            placeholder: 'Catatan...',
            tabsize:2,
            height:300,
            toolbar: [
                ['font', ['bold', 'underline', 'strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['paragraph']],
                ['table', ['table']],
            ],
        });
    });
</script>
@endsection