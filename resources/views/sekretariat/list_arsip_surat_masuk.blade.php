@extends('layouts.main')
@section('web_title', 'Arsip Surat Masuk')
@section('menu')
    @include('layouts.menu.sekretariat')
@endsection
@section('content_tittle', 'Arsip Surat Masuk')
@section('content')
<div>
    <div class="flex h-[60px] w-[600px] ml-auto">
        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-e-0 rounded-s-md">
            <i class="fas fa-search"></i>
        </span>
        <input type="text" class="rounded-none rounded-e-lg bg-white border focus:ring-green-500 focus:border-green-500 block flex-1 min-w-0 w-full text-sm border-gray-200 p-2.5" placeholder="Cari Arsip Surat Masuk">
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
                            <a href="/Sekretariat/DetailArsipSuratMasuk-{{ $item -> id }}">
                                <button class="w-[100px] bg-blue-700 p-3 rounded text-white hover:bg-blue-600">Detail Surat</button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="my-auto ml-auto">
                {{ $suratMasuk->links() }}
            </div>
        </div>
    </div>
</div>
@endsection