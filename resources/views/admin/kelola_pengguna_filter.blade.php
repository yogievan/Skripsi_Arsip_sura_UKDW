@extends('layouts.main')
@section('web_title', 'Kelola Pengguna')
@section('menu')
    @include('layouts.menu.admin')
@endsection
@section('content_tittle', 'Kelola Pengguna')
@section('content')
    <div>
        <div class="flex gap-4 mt-3">
            <div >
                {{-- Tambah Akun Pengguna --}}
                <button data-modal-target="tambah_akun" data-modal-toggle="tambah_akun" class="bg-[#006B3F] p-3 rounded text-white font-semibold hover:bg-[#018951]">Buat Akun Baru</button>

                {{-- Modal/ jendela Tambah Akun Pengguna --}}
                <div id="tambah_akun" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-[1000px] max-h-full">
                        <div class="relative bg-white rounded-lg shadow p-4">
                            {{-- head modal --}}
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Tambah Akun Pengguna
                                </h3>
                                <button data-modal-toggle="tambah_akun" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>

                            {{-- body modal --}}
                            <form id="form_tambah_pengguna" action="{{ route('TambahPengguna_admin') }}" method="post">
                                @csrf
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3">
                                        <div class="py-2">
                                            <label>Nama Lengkap</label>
                                            <input type="text" name="nama" placeholder="Masukkan Nama Pengguna" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" required>
                                        </div>
                                        <div class="py-2">
                                            <label>Email</label>
                                            <input type="email" name="email" placeholder="Masukkan email" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" required>
                                        </div>
                                        <div class="grid grid-cols-2 gap-4">
                                            <div class="py-2">
                                                <label>Username</label>
                                                <input type="text" name="username" placeholder="Masukkan Username" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" required>
                                            </div>
                                            <div class="py-2">
                                                <label>Password</label>
                                                <div class="flex gap-2">
                                                    <input type="password" id="myInput" name="password" value="12345678" placeholder="••••••••" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" required>
                                                    <img class="w-[25px] cursor-pointer" src="../assets/icons/eye-slash-solid.svg" alt="" onclick="myFunction()" id="pass-icon">
                                                </div>
                                                <p class="text-red-500 font-normal text-[14px]">*Note: Default Password = <b>12345678</b></p>
                                            </div>
                                        </div>
                                        <div class="py-2">
                                            <label>Role / Jabatan</label>
                                            <select name="role" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" required>
                                                <option >Pilih Role</option>
                                                <option value="KepalaUnit">Kepala Unit</option>
                                                <option value="DosenStaff">Dosen atau Staff</option>
                                                <option value="Sekretariat">Sekretariat</option>
                                                <option value="Admin">Admin</option>
                                            </select>
                                        </div>
                                        <div class="grid grid-cols-2 gap-4">
                                            <div class="py-2">
                                                <label>Unit</label>
                                                <select name="id_unit" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" required>
                                                    <option >Pilih Unit</option>
                                                    @foreach ($unit as $u)
                                                        <option value="{{ $u -> id }}">{{ $u -> unit }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="py-2">
                                                <label>Deskripsi Jabatan</label>
                                                <select name="id_jabatan" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" required>
                                                    <option >Pilih Deskripsi Jabatan</option>
                                                    @foreach ($jabatan as $j)
                                                        <option value="{{ $j -> id }}">{{ $j -> jabatan }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button class="bg-[#006B3F] p-3 rounded text-white font-semibold mt-3 hover:bg-[#018951] w-[200px]">Buat Akun</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ml-auto">
                <form action="{{route('FilterPengguna_admin')}}">
                    @csrf
                    <div class="flex h-[50px] w-[600px] ml-auto">
                        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-e-0 rounded-s-md">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" name="filter_pengguna" class="rounded-none rounded-e-lg bg-white border focus:ring-green-500 focus:border-green-500 block flex-1 min-w-0 w-full text-sm border-gray-200 p-2.5" placeholder="Cari Pengguna">
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
                            <th scope="col" class="p-2 text-center border w-[50px] text-gray-900">
                                ID
                            </th>
                            <th scope="col" class="p-2 text-center border w-[250px] text-gray-900">
                                Nama Pengguna
                            </th>
                            <th scope="col" class="p-2 text-center border w-auto text-gray-900">
                                Email
                            </th>
                            <th scope="col" class="p-2 text-center border w-auto text-gray-900">
                                Unit & Jabatan
                            </th>
                            <th scope="col" class="p-2 text-center border w-[150px] text-gray-900">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($users->count() >0)
                        @foreach ($users as $no =>$item)
                            <tr class="bg-white border-b">
                                <th scope="row" class="p-2 text-center border w-[50px] font-normal text-gray-900 whitespace-nowrap">
                                    {{ ++$no }}
                                </th>
                                <td class="p-2 border w-[250px] text-gray-900 font-normal break-words ">
                                    {{ $item -> nama }}
                                </td>
                                <td class="p-2 border w-auto text-gray-900 font-normal break-words">
                                    {{ $item -> email }}
                                </td>
                                <td class="p-2 border w-auto text-gray-900 font-normal break-words">
                                    @php
                                    // menyimpan nilai dalam atribut
                                        $userUnit = $item -> id_unit;
                                        $userJabatan = $item -> id_jabatan;
                                    @endphp

                                    {{-- menampilkan nama unit dan nama jabatan bila sama dengan nilai dari variable userUnit dan userJabatan --}}
                                    @foreach ($unit as $u)
                                        @if ($userUnit == $u -> id)
                                            {{ $u -> unit }}
                                        @endif
                                    @endforeach 
                                    :
                                    @foreach ($jabatan as $j)
                                        @if ($userJabatan == $j -> id)
                                            {{ $j -> jabatan }}
                                        @endif
                                    @endforeach
                                </td>
                                <td class="p-2 text-center border w-[150px] text-gray-900">
                                    <a href="/Admin/DetailPengguna-{{ $item -> id }}">
                                        <button class="bg-blue-700 p-3 rounded text-white hover:bg-blue-600">Detail Pengguna</button>
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

    <script>
        function myFunction() {
          var x = document.getElementById("myInput");
          if (x.type === "password") {
            x.type = "text";
            document.getElementById('pass-icon').src='../assets/icons/eye-solid.svg';
          } else {
            x.type = "password";
            document.getElementById('pass-icon').src='../assets/icons/eye-slash-solid.svg';
          }
        }
    </script>
@endsection