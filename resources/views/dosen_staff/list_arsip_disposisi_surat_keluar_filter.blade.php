@extends('layouts.main')
@section('web_title', 'Arsip Disposisi Surat Keluar')
@section('menu')
    @include('layouts.menu.dosen_staff')
@endsection
@section('content_tittle', 'Arsip Disposisi Surat Keluar')
@section('content')
<div>
    <div>
        <form action="{{route('FilterDisposisiSuratKeluar_dosenstaff')}}">
            @csrf
            <div class="flex w-[600px] ml-auto gap-1">
                <input type="date" name="filter_disposisi_surat_keluar" class="rounded-md bg-white border-green-500 focus:ring-green-500 focus:border-green-500 block flex-1 min-w-0 w-full text-sm p-2.5">
                <button class="bg-[#006B3F] p-3 rounded-md text-white ml-2 w-[150px] font-semibold">Cari</button>
            </div>
        </form>
    </div>
    <div class="mt-8">
        <div class="relative overflow-x-auto border rounded">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="p-2 text-center border w-[20px]">
                            No
                        </th>
                        <th scope="col" class="p-2 text-center border w-[100px]">
                            Tanggal
                        </th>
                        <th scope="col" class="p-2 text-center border w-[100px]">
                            ID Surat Keluar
                        </th>
                        <th scope="col" class="p-2 text-center border w-[200px]">
                            Pengirim Surat
                        </th>
                        <th scope="col" class="p-2 text-center border w-[200px]">
                            Penerima Surat
                        </th>
                        <th scope="col" class="p-2 text-center border w-[150px]">
                            File Surat
                        </th>
                        <th scope="col" class="p-2 text-center border w-[150px]">
                            Status Surat
                        </th>
                        <th scope="col" class="p-2 text-center border w-[200px]">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($disposisiSuratKeluar->count() >0)
                    @foreach ($disposisiSuratKeluar as $no => $item)
                    <tr class="border">
                        <td scope="row" class="p-2 text-center border w-[20px] font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ ++$no}}
                        </td>
                        <td class="p-2 text-center border w-[100px] break-words">
                            {{ ($item -> created_at)->format('D, d M Y') }}
                        </td>
                        <td class="p-2 border w-[100px] text-center break-words">
                            {{ $item -> id_surat_keluar }} 
                        </td>
                        <td class="p-2 border w-[20opx] text-center break-words">
                            {{ $item -> pengirim }} 
                        </td>
                        <td class="p-2 border w-[200px] text-center break-words">
                            {{ $item -> penerima }} 
                        </td>
                        <td class="p-2 text-center border w-[150px] break-words">
                            {{ $item -> lampiran_1 }} <br>
                            {{ $item -> lampiran_2 }} <br>
                            {{ $item -> lampiran_3 }}
                        </td>
                        <td class="p-2 text-center border w-[150px]">
                            @php
                                if ( $item -> status_disposisi == 'Disposisi Terkirim') {
                                    echo "<p> $item->status_disposisi </p>";
                                }else {
                                    echo "<p> $item->status_disposisi </p>";
                                }
                            @endphp
                        </td>
                        <td class="flex gap-2 justify-center m-2 py-4 w-auto">
                            <a href="/DosenStaff/DetailArsipDisposisiSuratKeluar-{{ $item -> id }}-{{$item -> id_surat_keluar}}">
                                <button class="w-full bg-blue-700 p-3 rounded text-white hover:bg-blue-600">Detail Surat Disposisi</button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr class="border">
                        <td colspan="8" class="text-center p-2">No Record Data Disposisi Surat Keluar</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection