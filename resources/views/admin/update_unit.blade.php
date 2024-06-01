@extends('layouts.main')
@section('web_title', 'Update Unit')
@section('menu')
    @include('layouts.menu.admin')
@endsection
@section('content_tittle', 'Update Unit UKDW')
@section('content')
    <div>
        <form action="/Admin/EditUnitSubmit-{{ $unit -> id }}" method="post">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3">
                    <div class="py-2">
                        <label class="font-semibold">Unit Universitas Kristen Duta Wacana</label>
                        <input name="unit" type="text" value="{{ $unit -> unit }}" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" placeholder="Masukkan Kategori Surat" required>
                    </div>
                </div>
            </div>
            <div class="flex gap-4">
                <button class="bg-[#006B3F] p-3 rounded text-white font-semibold mt-3 hover:bg-[#1c9e68] w-[200px]">Simpan Pembaruan</button>
                <a href="{{ route('Unit_admin') }}">
                    <button class="bg-red-500 p-3 rounded text-white font-semibold mt-3 hover:bg-red-400 w-[200px]">Batalkan</button>
                </a>
            </div>
        </form>
    </div>
@endsection