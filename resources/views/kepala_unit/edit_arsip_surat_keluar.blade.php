@extends('layouts.main')
@section('web_title', 'Edit Arsip Surat Kepala Unit')
@section('menu')
    @include('layouts.menu.kepala_unit')
@endsection
@section('content_tittle', 'Edit Arsip Surat Keluar')
@section('content')
<div>
    <a href="{{ URL::previous() }}">
        <button class="p-2 bg-slate-600 text-white rounded-md text-[18px] my-auto">
            <i class="fas fa-angle-double-left text-[18px] my-auto"></i> Kembali
        </button>
    </a>
    <form class="mt-5" action="/KepalaUnit/EditArsipSuratKeluar-{{ $suratKeluar -> id }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label class="font-semibold">Kode Surat</label>
            <div class="flex gap-2 w-">
                <select name="id_kategori_surat" class="bg-white p-2 rounded w-[200px] outline-none font-normal focus:ring-green-500 focus:border-green-500" required>
                    <option selected>Pilih Kode Surat</option>
                    @foreach ($kategori_surat as $item)
                        @if ($suratKeluar -> id_kategori_surat == $item -> id)
                            <option selected value="{{ $item -> id }}">{{ $item -> kategori_surat }}</option>
                        @else
                            <option value="{{ $item -> id }}">{{ $item -> kategori_surat }}</option>
                        @endif
                    @endforeach
                </select>
                <input name="no_urut" type="number" class="block bg-white rounded w-[100px] outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" placeholder="No">
                <select name="id_unit" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" required>
                    <option selected>Pilih Unit</option>
                    @foreach ($unit as $item)
                        @if ($suratKeluar -> id_unit == $item -> id)
                            <option selected value="{{ $item -> id }}">{{ $item -> unit }}</option>
                        @else
                            <option value="{{ $item -> id }}">{{ $item -> unit }}</option>
                        @endif
                    @endforeach
                </select>
                <select name="bulan" class="bg-white p-2 rounded outline-none w-[100px] font-normal focus:ring-green-500 focus:border-green-500" required>
                    <option selected>Bulan</option>
                    <option value="I">I</option>
                    <option value="II">II</option>
                    <option value="III">III</option>
                    <option value="IV">IV</option>
                    <option value="V">V</option>
                    <option value="VI">VI</option>
                    <option value="VII">VII</option>
                    <option value="VIII">VIII</option>
                    <option value="IX">IX</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>
                <input name="tahun" type="number" value="{{$year}}" class="block bg-white rounded w-[100px] outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" placeholder="Tahun">
            </div>
        </div>
        <div class="my-2">
            <label class="font-semibold">Pengirim Surat</label>
            <input name="pengirim" value="{{$suratKeluar -> pengirim}}" type="email" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" readonly>
        </div>
        <div class="my-2">
            <label class="font-semibold">Penerima Surat</label>
            <input name="penerima" value="{{$suratKeluar -> penerima}}" type="email" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500">
        </div>
        <div class="my-2">
            <label class="font-semibold">Subjek</label>
            <input name="subjek" value="{{$suratKeluar -> subjek}}" type="text" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" placeholder="Subjek:" required>
        </div>
        <div class="my-2">
            <textarea id="catatan_surat_keluar" name="catatan" class="block bg-white w-full rounded font-normal focus:ring-green-500 focus:border-green-500">
                {{$suratKeluar -> catatan}}
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
            $('#catatan_surat_keluar').summernote({
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
