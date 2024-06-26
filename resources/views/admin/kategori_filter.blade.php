@extends('layouts.main')
@section('web_title', 'Kategori')
@section('menu')
    @include('layouts.menu.admin')
@endsection
@section('content_tittle', 'Kategori Surat')
@section('content')
    <div>
        <div class="flex gap-4 mt-3">
            <div>
                {{-- Tambah kategori --}}
                <button data-modal-target="tambah_kategori" data-modal-toggle="tambah_kategori" class="bg-[#006B3F] p-3 rounded text-white font-semibold hover:bg-[#018951]">Tambah Kategori Surat</button>

                {{-- Modal/ jendela Tambah kategori --}}
                <div id="tambah_kategori" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-[1000px] max-h-full">
                        <div class="relative bg-white rounded-lg shadow p-4">
                            {{-- head modal --}}
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Tambah Kategori Surat
                                </h3>
                                <button data-modal-toggle="tambah_kategori" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>

                            {{-- body modal --}}
                            <form action="{{ route('TambahKategori_admin') }}" method="post">
                                @csrf
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3">
                                        <div class="py-2">
                                            <label class="font-semibold">Kode Surat</label>
                                            <input name="letter_code" type="text" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" placeholder="Letter Code Kategori Surat" required>
                                        </div>
                                        <div class="py-2">
                                            <label class="font-semibold">Keterangan Kategori Surat</label>
                                            <input name="kategori_surat" type="text" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" placeholder="Keterangan Kategori Surat" required>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button class="bg-[#006B3F] p-3 rounded text-white font-semibold mt-3 hover:bg-[#1c9e68] w-[200px]">Tambah Kategori Surat</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ml-auto">
                <form action="{{route('FilterKategoriSurat_admin')}}">
                    @csrf
                    <div class="flex h-[50px] w-[600px] ml-auto">
                        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-e-0 rounded-s-md">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" name="filter_kategori_surat" class="rounded-none rounded-e-lg bg-white border focus:ring-green-500 focus:border-green-500 block flex-1 min-w-0 w-full text-sm border-gray-200 p-2.5" placeholder="Cari Pengguna">
                        <button class="bg-[#006B3F] p-3 rounded-md text-white ml-2 w-[100px] font-semibold">Cari</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- table --}}
        <div class="mt-8">
            <div class="relative overflow-x-auto border rounded">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="p-2 text-center border w-[20px] text-gray-900">
                                No
                            </th>
                            <th scope="col" class="p-2 text-center border w-[150px] text-gray-900">
                                Kategori
                            </th>
                            <th scope="col" class="p-2 text-center border w-auto text-gray-900">
                                Deskripsi Kategori
                            </th>
                            <th scope="col" class="p-2 text-center border w-[270px] text-gray-900">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($kategori->count() >0)
                            @foreach ($kategori as $no => $item)
                                <tr class="bg-white border-b">
                                    <th scope="row" class="p-2 text-center border w-[20px] font-normal text-gray-900 whitespace-nowrap">
                                        {{ $item -> id }}
                                    </th>
                                    <td class="p-2 border w-[150px] text-gray-900 font-normal break-words ">
                                        {{ $item -> letter_code }}
                                    </td>
                                    <td class="p-2 border w-auto text-gray-900 font-normal break-words ">
                                        {{ $item -> kategori_surat }}
                                    </td>
                                    <td class="flex gap-2 m-2 justify-center">
                                        <a href="/Admin/EditKategori-{{ $item -> id }}">
                                            <button class="bg-blue-700 p-3 rounded text-white hover:bg-blue-600">
                                                <i class="fas fa-edit"></i>
                                                Edit
                                            </button>
                                        </a>
                                        <a href="/Admin/HapusKategori-{{ $item -> id }}">
                                            <button class="bg-red-500 p-3 rounded text-white hover:bg-red-400" onclick="return confirm('Anda Yakin Menghapus Kategori?')">
                                                <i class="fas fa-trash-alt"></i>
                                                Hapus
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                        <tr class="border">
                            <td colspan="5" class="text-center p-2">
                                No Data Record Users
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection