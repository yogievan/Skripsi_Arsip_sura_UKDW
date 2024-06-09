@extends('layouts.main')
@section('web_title', 'Arsip Surat Kepala Unit')
@section('menu')
    @include('layouts.menu.sekretariat')
@endsection
@section('content_tittle', 'Arsip Surat')
@section('content')
<div>
    <div class="flex gap-4">
        <button data-modal-target="tambah_arsip_surat_masuk" data-modal-toggle="tambah_arsip_surat_masuk" class="bg-[#006B3F] p-3 rounded text-white font-semibold mt-3 hover:bg-[#018951]">Arsip Surat Masuk</button>
        <button data-modal-target="tambah_arsip_surat_keluar" data-modal-toggle="tambah_arsip_surat_keluar" class="bg-[#006B3F] p-3 rounded text-white font-semibold mt-3 hover:bg-[#018951]">Arsip Surat Keluar</button>
    </div>

    {{-- modal popup  tambah_arsip_surat_masuk--}}
    <div id="tambah_arsip_surat_masuk" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-[1000px] desktop:max-w-[1500px] max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 laptop:p-5 border-b border-[#006B3F] rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Arsip Surat Masuk
                    </h3>
                    <button data-modal-hide="tambah_arsip_surat_masuk" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <div class="p-4">
                    <form action="{{route('ArsipSuratMasuk_sekretariat')}}" method="POST">
                        @csrf
                        <div class="grid grid-cols-3 gap-4 my-2">
                            <div class="col-span-1">
                                <label class="font-semibold">Kategori Surat</label>
                                <select name="id_kategori_surat" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" required>
                                    <option selected>Pilih Kategori Surat</option>
                                    @foreach ($kategori_surat as $item)
                                        <option value="{{ $item -> id }}">{{ $item -> kategori_surat }} ({{ $item -> letter_code }})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-2">
                                <label class="font-semibold">Unit Pengirim Surat</label>
                                <select name="id_unit" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" required>
                                    <option selected>Pilih Unit Pengirim Surat</option>
                                    @foreach ($unit as $item)
                                        <option value="{{ $item -> id }}">{{ $item -> unit }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="my-2">
                            <label class="font-semibold">Pengirim Surat</label>
                            <input name="pengirim" value="{{$pengirim}}" type="email" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" readonly>
                        </div>
                        <div class="my-2">
                            <label class="font-semibold">Penerima Surat</label>
                            <input name="penerima" type="email" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500">
                        </div>
                        <div class="my-2">
                            <label class="font-semibold">Subjek</label>
                            <input name="subjek" type="text" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" placeholder="Subjek:" required>
                        </div>
                        <div class="my-2">
                            <textarea id="catatan_surat_masuk" name="catatan" class="block bg-white w-full rounded font-normal focus:ring-green-500 focus:border-green-500"></textarea>
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

    {{-- modal popup  tambah_arsip_surat_keluar--}}
    <div id="tambah_arsip_surat_keluar" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-[1000px] desktop:max-w-[1500px] max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 laptop:p-5 border-b border-[#006B3F] rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Arsip Surat Keluar
                    </h3>
                    <button data-modal-hide="tambah_arsip_surat_keluar" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <div class="p-4">
                    <form action="{{route('ArsipSuratKeluar_sekretariat')}}" method="POST">
                        @csrf
                        <div>
                            <label class="font-semibold">Kode Surat</label>
                            <div class="flex gap-2 w-">
                                <select name="id_kategori_surat" class="bg-white p-2 rounded w-[200px] outline-none font-normal focus:ring-green-500 focus:border-green-500" required>
                                    <option selected>Pilih Kode Surat</option>
                                    @foreach ($kategori_surat as $item)
                                        <option value="{{ $item -> id }}">{{ $item -> kategori_surat }} ({{ $item -> letter_code }})</option>
                                    @endforeach
                                </select>
                                <input name="no_urut" type="number" class="block bg-white rounded w-[100px] outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" placeholder="No">
                                <select name="id_unit" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" required>
                                    <option selected>Pilih Unit Pembuat Surat</option>
                                    @foreach ($unit as $item)
                                        <option value="{{ $item -> id }}">{{ $item -> unit }}</option>
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
                            <input name="pengirim" type="email" value="{{$pengirim}}" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" readonly>
                        </div>
                        <div class="my-2">
                            <label class="font-semibold">Penerima Surat</label>
                            <i data-tooltip-target="info_penerima_one" class="fas fa-info-circle ml-1"></i>
                            <div id="info_penerima_one" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Field ini dapat dikosongi
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <input name="penerima" type="email" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500">
                        </div>
                        <div class="my-2">
                            <label class="font-semibold">Unit Penerima Surat</label>
                            <i data-tooltip-target="info_penerima_unit" class="fas fa-info-circle ml-1"></i>
                            <div id="info_penerima_unit" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Field ini dapat dikosongi
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <select name="unit_penerima" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500">
                                <option value="" selected>Pilih Unit Penerima</option>
                                @foreach ($unit as $item)
                                    <option value="{{ $item -> id }}">{{ $item -> unit }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="my-2">
                            <label class="font-semibold">Subjek</label>
                            <input name="subjek" type="text" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" placeholder="Subjek:" required>
                        </div>
                        <div class="my-2">
                            <textarea id="catatan_surat_Keluar" name="catatan" class="block bg-white w-full rounded font-normal focus:ring-green-500 focus:border-green-500"></textarea>
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
    {{-- tabel surat masuk --}}
    <div class="mt-8">
        <p class="font-semibold mb-2 text-[18px]">List Surat Masuk ({{ $date }})</p>
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
                                <a href="/Sekretariat/DetailArsipSuratMasuk-{{ $item -> id }}">
                                    <button class="w-[100px] bg-blue-700 p-3 rounded text-white hover:bg-blue-600">Detail Surat</button>
                                </a>
                                <a href="/Sekretariat/ViewEditArsipSuratMasuk-{{ $item -> id }}">
                                    <button class="w-[100px] bg-yellow-400 p-3 rounded text-white hover:bg-yellow-300">Edit Surat</button>
                                </a>
                                <a href="/Sekretariat/HapusArsipSuratMasuk-{{ $item -> id }}">
                                    <button class="w-[50px] bg-red-600 p-3 rounded text-white hover:bg-red-500" onclick="return confirm('Apakah Surat akan dihapus?')">
                                        <i class="fas fa-trash-alt text-white"></i>
                                    </button>
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

    {{-- tabel surat Keluar --}}
    <div class="mt-8">
        <p class="font-semibold mb-2 text-[18px]">List Surat Masuk ({{ $date }})</p>
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
                            Kode Surat
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
                    @if ($suratKeluar->count() >0)
                        @foreach ($suratKeluar as $no => $item)
                        <tr class="border">
                            <td scope="row" class="p-2 text-center border w-[20px] font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ ++$no}}
                            </td>
                            <td class="p-2 text-center border w-[100px] break-words">
                                {{ ($item -> created_at)->format('D, d M Y') }}
                            </td>
                            <td class="p-2 text-center border w-[100px] break-words">
                                {{ $item -> kode_surat }}
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
                                <a href="/Sekretariat/DetailArsipSuratKeluar-{{ $item -> id }}">
                                    <button class="w-[100px] bg-blue-700 p-3 rounded text-white hover:bg-blue-600">Detail Surat</button>
                                </a>
                                <a href="/Sekretariat/ViewEditArsipSuratKeluar-{{ $item -> id }}">
                                    <button class="w-[100px] bg-yellow-400 p-3 rounded text-white hover:bg-yellow-300">Edit Surat</button>
                                </a>
                                <a href="/Sekretariat/HapusArsipSuratKeluar-{{ $item -> id }}">
                                    <button class="w-[50px] bg-red-600 p-3 rounded text-white hover:bg-red-500" onclick="return confirm('Apakah Surat akan dihapus?')">
                                        <i class="fas fa-trash-alt text-white"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    @else
                    <tr class="border">
                        <td colspan="7" class="text-center p-2">No Record Data Surat Keluar</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <div class="my-auto ml-auto">
                {{ $suratKeluar->links() }}
            </div>
        </div>
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
        $(document).ready(function() {
            $('#catatan_surat_Keluar').summernote({
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
</div>
@endsection
