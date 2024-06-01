@extends('layouts.main')
@section('web_title', 'Update Kategori')
@section('menu')
    @include('layouts.menu.admin')
@endsection
@section('content_tittle', 'Update Kategori Surat')
@section('content')
    <div>
        <form action="/Admin/EditKategoriSubmit-{{ $kategori -> id }}" method="post">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3">
                    <div class="py-2">
                        <label class="font-semibold">Kategori</label>
                        <input name="kategori_surat" type="text" value="{{ $kategori -> kategori_surat }}" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" placeholder="Masukkan Kategori Surat" required>
                    </div>
                    <div class="py-2">
                        <label class="font-semibold">Deskripsi Keterangan</label>
                        <textarea name="deskripsi" class="block bg-white w-full h-[300px] rounded font-normal focus:ring-green-500 focus:border-green-500" required>
                            {{ $kategori -> deskripsi }}
                        </textarea>
                    </div>
                </div>
            </div>
            <div class="flex gap-4">
                <button class="bg-[#006B3F] p-3 rounded text-white font-semibold mt-3 hover:bg-[#1c9e68] w-[200px]">Simpan Pembaruan</button>
            </div>
        </form>
    </div>
@endsection