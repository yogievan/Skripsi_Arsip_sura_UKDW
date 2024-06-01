@extends('layouts.main')
@section('web_title', 'Dashboard Sekretariat')
@section('menu')
    @include('layouts.menu.sekretariat')
@endsection
@section('content_tittle', 'Dashboard')
@section('optional_content')
    <div class="grid grid-cols-3 gap-5 mt-5">
        <div class="bg-white rounded-md shadow p-3 w-full border border-l-4 border-l-blue-800">
            <div>
                <p class="text-[16px] font-semibold">Total Surat Masuk</p>
            </div>
            <div class="ml-auto">
                <p class="font-bold text-[24px] break-words">
                    Nominal Surat
                </p>
            </div>
        </div>
        <div class="bg-white rounded-md shadow p-3 w-full border border-l-4 border-l-yellow-400">
            <div>
                <p class="text-[16px] font-semibold">Total Surat Keluar</p>
            </div>
            <div class="ml-auto">
                <p class="font-bold text-[24px] break-words">
                    Nominal Surat
                </p>
            </div>
        </div>
        <div class="bg-white rounded-md shadow p-3 w-full border border-l-4 border-l-red-600">
            <div>
                <p class="text-[16px] font-semibold">Total Surat Disposisi</p>
            </div>
            <div class="ml-auto">
                <p class="font-bold text-[24px] break-words">
                    Nominal Surat
                </p>
            </div>
        </div>
    </div>
@endsection
@section('content')
<div>
    @if (session('success_message'))
        <div class="alert alert-success">
            {{ session('success_message') }}
        </div>
    @endif
    
</div>
@endsection