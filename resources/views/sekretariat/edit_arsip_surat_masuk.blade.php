@extends('layouts.main')
@section('web_title', 'Edit Arsip Surat Kepala Unit')
@section('menu')
    @include('layouts.menu.sekretariat')
@endsection
@section('content_tittle', 'Edit Arsip Surat Masuk')
@section('content')
<div>
    <a href="{{ URL::previous() }}">
        <button class="p-2 bg-slate-600 text-white rounded-md text-[18px] my-auto">
            <i class="fas fa-angle-double-left text-[18px] my-auto"></i> Kembali
        </button>
    </a>
    <form class="mt-5" action="/Sekretariat/EditArsipSuratMasuk-{{ $suratMasuk -> id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-3 gap-4 my-2">
            <div class="col-span-1">
                <label class="font-semibold">Kategori Surat</label>
                <select name="id_kategori_surat" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" required>
                    <option selected>Pilih Kategori Surat</option>
                    @foreach ($kategori_surat as $item)
                        @if ($suratMasuk -> id_kategori_surat == $item -> id)
                            <option selected value="{{ $item -> id }}">{{ $item -> kategori_surat }}</option>
                        @else
                            <option value="{{ $item -> id }}">{{ $item -> kategori_surat }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-span-2">
                <label class="font-semibold">Unit Pengirim</label>
                <select name="id_unit" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" required>
                    <option selected>Pilih Unit Pengirim</option>
                    @foreach ($unit as $item)
                        @if ($suratMasuk -> id_unit == $item -> id)
                            <option selected value="{{ $item -> id }}">{{ $item -> unit }}</option>
                        @else
                            <option value="{{ $item -> id }}">{{ $item -> unit }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="my-2">
            <label class="font-semibold">Pengirim Surat</label>
            <input name="pengirim" value="{{$suratMasuk -> pengirim}}" type="email" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" readonly>
        </div>
        <div class="my-2">
            <label class="font-semibold">Penerima Surat</label>
            <input name="penerima" value="{{$suratMasuk -> penerima}}" type="email" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500">
        </div>
        <div class="my-2">
            <label class="font-semibold">Subjek</label>
            <input name="subjek" value="{{$suratMasuk -> subjek}}" type="text" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" placeholder="Subjek:" required>
        </div>
        <div class="my-2">
            <textarea id="catatan_surat_masuk" name="catatan" class="block bg-white w-full rounded font-normal focus:ring-green-500 focus:border-green-500">
                {{$suratMasuk -> catatan}}
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

<script>
    $(document).ready(function() {
            $('#catatan_surat_masuk').summernote({
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
