@extends('layouts.main')
@section('web_title', 'Arsip Surat Masuk')
@section('menu')
    @include('layouts.menu.dosen_staff')
@endsection
@section('content_tittle', 'Arsip Surat Masuk')
@section('content')
<div>
    <div>
        <form action="{{route('FilterSuratMasuk_dosenstaff')}}">
            @csrf
            <div class="flex w-[600px] ml-auto gap-1">
                <input type="date" name="filter_surat_masuk" class="rounded-md bg-white border-green-500 focus:ring-green-500 focus:border-green-500 block flex-1 min-w-0 w-full text-sm p-2.5">
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
                        <th scope="col" class="p-2 text-center border w-[300px]">
                            Subjek
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
                    @if ($suratMasuk->count() >0)
                    @foreach ($suratMasuk as $no => $item)
                    <tr class="border">
                        <td scope="row" class="p-2 text-center border w-[20px] font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ ++$no}}
                        </td>
                        <td class="p-2 text-center border w-[100px] break-words">
                            {{ ($item -> created_at)->format('D, d M Y') }}
                        </td>
                        <td class="p-2 border w-[300px] break-words">
                            {{ $item -> subjek }} 
                        </td>
                        <td class="p-2 text-center border w-[150px] break-words">
                            {{ $item -> lampiran_1 }} <br>
                            {{ $item -> lampiran_2 }} <br>
                            {{ $item -> lampiran_3 }}
                        </td>
                        <td class="p-2 text-center border w-[150px]">
                            @php
                                if ( $item -> status_surat == 'Surat Tervalidasi Kepala Unit') {
                                    echo "<p> $item->status_surat </p>";
                                }else {
                                    echo "<p> $item->status_surat </p>";
                                }
                            @endphp
                        </td>
                        <td class="flex gap-2 justify-center m-2 py-4 w-auto">
                            <a href="/DosenStaff/DetailArsipSuratMasuk-{{ $item -> id }}">
                                <button class="w-[100px] bg-blue-700 p-3 rounded text-white hover:bg-blue-600">Detail Surat</button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                        <tr class="border">
                            <td colspan="6" class="text-center p-2">No Record Data Surat Masuk</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <div class="my-auto ml-auto">
                {{ $suratMasuk->links() }}
            </div>
        </div>
    </div>
</div>
@endsection