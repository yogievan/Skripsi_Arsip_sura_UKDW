@extends('layouts.main')
@section('web_title', 'Dashboard Dosen & Staff')
@section('menu')
    @include('layouts.menu.dosen_staff')
@endsection
@section('content_tittle', 'Dashboard')
@section('optional_content')
    <div class="grid grid-cols-4 gap-3 mt-3">
        <div class="bg-white rounded-md shadow p-3 w-full border border-l-4 border-l-[#0000ff]">
            <div>
                <p class="text-[16px] font-normal">Total Surat Masuk</p>
            </div>
            <div class="ml-auto">
                <p class="font-bold text-[24px] break-words">
                    {{$suratMasuk_count_day}} Surat
                </p>
                <hr class="p3">
                <p class="text-gray-500 font-normal text-[14px]">Tanggal: {{$tgl}}</p>
            </div>
        </div>
        <div class="bg-white rounded-md shadow p-3 w-full border border-l-4 border-l-[#ff9933]">
            <div>
                <p class="text-[16px] font-normal">Total Surat Keluar</p>
            </div>
            <div class="ml-auto">
                <p class="font-bold text-[24px] break-words">
                    {{$suratKeluar_count_day}} Surat
                </p>
                <hr class="p3">
                <p class="text-gray-500 font-normal text-[14px]">Tanggal: {{$tgl}}</p>
            </div>
        </div>
        <div class="bg-white rounded-md shadow p-3 w-full border border-l-4 border-l-[#ff0000]">
            <div>
                <p class="text-[16px] font-normal">Total Disposisi Surat Masuk</p>
            </div>
            <div class="ml-auto">
                <p class="font-bold text-[24px] break-words">
                    {{$disposisiSuratMasuk_count_day}} Surat
                </p>
                <hr class="p3">
                <p class="text-gray-500 font-normal text-[14px]">Tanggal: {{$tgl}}</p>
            </div>
        </div>
        <div class="bg-white rounded-md shadow p-3 w-full border border-l-4 border-l-[#009933]">
            <div>
                <p class="text-[16px] font-normal">Total Disposisi Surat Keluar</p>
            </div>
            <div class="ml-auto">
                <p class="font-bold text-[24px] break-words">
                    {{$disposisiSuratKeluar_count_day}} Surat
                </p>
                <hr class="p3">
                <p class="text-gray-500 font-normal text-[14px]">Tanggal: {{$tgl}}</p>
            </div>
        </div>
    </div>
@endsection
@section('graph_content')
<div class="grid grid-cols-5 gap-3">
    <div class="col-span-4 bg-white rounded-md shadow p-3 border mt-3">
        <div>
            <h5 class="leading-none text-3xl font-bold pb-2">Grafik Arsip Surat</h5>
            <p class="font-normal text-gray-500 text-[14px]">Jumlah Arsip Surat Per-bulan ({{$bulan}})</p>
        </div>
        <hr class="my-2">
        <div id="size-chart" class="w-full"></div>
    </div>
    <div class="col-span-1 bg-white rounded-md shadow p-3 border mt-3">
        <div>
            <h5 class="leading-none text-3xl font-bold pb-2">Grafik Arsip Surat</h5>
            <p class="font-normal text-gray-500 text-[14px]">Jumlah Arsip Surat Per-tahun ({{$tahun}})</p>
        </div>
        <hr class="my-2">
        <div id="pie-chart"></div>
    </div>
</div>
<script>
    const options = {
        chart: {
            // add these lines to update the size of the chart
            height: 300,
            type: "area",
            dropShadow: {
            enabled: false,
            },
            toolbar: {
                show: false,
            },
        },
        tooltip: {
            enabled: true,
            x: {
                show: false,
            },
        },
        fill: {
            type: "gradient",
            gradient: {
                opacityFrom: 0.55,
                opacityTo: 0,
                shade: "#0000ff",
                gradientToColors: ["#0000ff"],
            },
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            width: 6,
        },
        grid: {
            show: true,
            strokeDashArray: 4,
        },
        series: [
            {
                name: "Arsip Surat Masuk",
                data: [{{$suratMasuk_count_Jan}},{{$suratMasuk_count_Feb}},{{$suratMasuk_count_Mar}},{{$suratMasuk_count_Apr}},{{$suratMasuk_count_Mei}},{{$suratMasuk_count_Jun}},{{$suratMasuk_count_Jul}},{{$suratMasuk_count_Aug}},{{$suratMasuk_count_Sep}},{{$suratMasuk_count_Okt}},{{$suratMasuk_count_Nov}},{{$suratMasuk_count_Des}},],
                color: "#0000ff",
            },
            {
                name: "Arsip Surat Keluar",
                data: [{{$suratKeluar_count_Jan}},{{$suratKeluar_count_Feb}},{{$suratKeluar_count_Mar}},{{$suratKeluar_count_Apr}},{{$suratKeluar_count_Mei}},{{$suratKeluar_count_Jun}},{{$suratKeluar_count_Jul}},{{$suratKeluar_count_Aug}},{{$suratMasuk_count_Sep}},{{$suratKeluar_count_Okt}},{{$suratKeluar_count_Nov}},{{$suratKeluar_count_Des}},],
                color: "#ff9933",
            },
            {
                name: "Disposisi Arsip Surat Masuk",
                data: [{{$disposisiSuratMasuk_count_Jan}},{{$disposisiSuratMasuk_count_Feb}},{{$disposisiSuratMasuk_count_Mar}},{{$disposisiSuratMasuk_count_Apr}},{{$disposisiSuratMasuk_count_Mei}},{{$disposisiSuratMasuk_count_Jun}},{{$disposisiSuratMasuk_count_Jul}},{{$disposisiSuratMasuk_count_Aug}},{{$disposisiSuratMasuk_count_Sep}},{{$disposisiSuratMasuk_count_Okt}},{{$disposisiSuratMasuk_count_Nov}},{{$disposisiSuratMasuk_count_Des}},],
                color: "#ff0000",
            },
            {
                name: "Disposisi Arsip Surat Keluar",
                data: [{{$suratMasuk_count_Jan}},{{$disposisiSuratKeluar_count_Feb}},{{$disposisiSuratKeluar_count_Mar}},{{$disposisiSuratKeluar_count_Apr}},{{$disposisiSuratKeluar_count_Mei}},{{$disposisiSuratKeluar_count_Jun}},{{$disposisiSuratKeluar_count_Jul}},{{$disposisiSuratKeluar_count_Aug}},{{$disposisiSuratKeluar_count_Sep}},{{$disposisiSuratKeluar_count_Okt}},{{$disposisiSuratKeluar_count_Nov}},{{$disposisiSuratKeluar_count_Des}},],
                color: "#009933",
            },
        ],
        xaxis: {
            categories: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Aug','Sep','Okt','Nov','Des'],
            labels: {
                show: true,
            },
            axisBorder: {
                show: true,
            },
            axisTicks: {
                show: true,
            },
        },
        yaxis: {
            show: false,
        },
        padding: {
            left: 2,
            right: 2,
        },
    }

    if (document.getElementById("size-chart") && typeof ApexCharts !== 'undefined') {
    const chart = new ApexCharts(document.getElementById("size-chart"), options);
    chart.render();
    }

    const getChartOptions = () => {
        return {
            series: [{{$suratMasuk_count_yaer}}, {{$suratKeluar_count_yaer}}, {{$disposisiSuratMasuk_count_yaer}}, {{$disposisiSuratKeluar_count_yaer}}],
            colors: ["#0000ff", "#ff9933", "#ff0000", "#009933"],
            chart: {
                height: 300,
                width: "100%",
                type: "pie",
            },
            stroke: {
                colors: ["white"],
                lineCap: "",
            },
            plotOptions: {
                pie: {
                    labels: {
                    show: true,
                    },
                    size: "100%",
                    dataLabels: {
                    offset: -25
                    }
                },
            },
            labels: ["Arsip Surat Masuk", "Arsip Surat Keluar", "Disposisi Arsip Surat Masuk", "Disposisi Arsip Surat Keluar"],
                dataLabels: {
                    enabled: true,
                },
                legend: {
                    position: "bottom",
                },
                yaxis: {
                    labels: {
                        formatter: function (value) {
                            return value + "%"
                        },
                    },
            },
            xaxis: {
                labels: {
                    formatter: function (value) {
                        return value  + "%"
                    },
                },
                axisTicks: {
                    show: false,
                },
                axisBorder: {
                    show: false,
                },
            },
        }
    }

    if (document.getElementById("pie-chart") && typeof ApexCharts !== 'undefined') {
    const chart = new ApexCharts(document.getElementById("pie-chart"), getChartOptions());
    chart.render();
}
</script>
@endsection
@section('content')
<div>
    @if (session('success_message'))
        <div class="alert alert-success">
            {{ session('success_message') }}
        </div>
    @endif
</div>
<div>
    <div class="mt-3">
        <p class="font-semibold mb-2 text-[18px]">List Surat Masuk yang diterima ({{ $tgl }})</p>
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
                    @if ($suratMasuk_day->count() >0)
                    @foreach ($suratMasuk_day as $no => $item)
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
        </div>
        <div class="mt-3">
            {{ $suratMasuk_day->links() }}
        </div>
    </div>
    <div class="mt-3">
        <p class="font-semibold mb-2 text-[18px]">List Surat Keluar yang diterima ({{ $tgl }})</p>
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
                    @if ($suratKeluar_day->count() >0)
                    @foreach ($suratKeluar_day as $no => $item)
                    <tr class="border">
                        <td scope="row" class="p-2 text-center border w-[20px] font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ ++$no}}
                        </td>
                        <td class="p-2 text-center border w-[100px] break-words">
                            {{ ($item -> created_at)->format('D, d M Y') }}
                        </td>
                        <td class="p-2 text-center border w-[100px] break-words">
                            {{ ($item -> kode_surat) }}
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
                            <a href="/DosenStaff/DetailArsipSuratKeluar-{{ $item -> id }}">
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
        </div>
        <div class="mt-3">
            {{ $suratKeluar_day->links() }}
        </div>
    </div>
    <div class="mt-3">
        <p class="font-semibold mb-2 text-[18px]">List Disposisi Surat masuk yang diterima ({{ $tgl }})</p>
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
                            ID Surat Masuk
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
                    @if ($disposisiSuratMasuk_day->count() >0)
                    @foreach ($disposisiSuratMasuk_day as $no => $item)
                    <tr class="border">
                        <td scope="row" class="p-2 text-center border w-[20px] font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ ++$no}}
                        </td>
                        <td class="p-2 text-center border w-[100px] break-words">
                            {{ ($item -> created_at)->format('D, d M Y') }}
                        </td>
                        <td class="p-2 border w-[100px] text-center break-words">
                            {{ $item -> id_surat_masuk }} 
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
                            <a href="/DosenStaff/DetailArsipDisposisiSuratMasuk-{{ $item -> id }}-{{ $item -> id_surat_masuk }}">
                                <button class="w-full bg-blue-700 p-3 rounded text-white hover:bg-blue-600">Detail Surat Disposisi</button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr class="border">
                        <td colspan="8" class="text-center p-2">No Record Data Disposisi Surat Masuk</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <div class="my-auto ml-auto">
                {{ $disposisiSuratMasuk_day->links() }}
            </div>
        </div>
    </div>
    <div class="mt-3">
        <p class="font-semibold mb-2 text-[18px]">List Disposisi Surat Keluar yang diterima ({{ $tgl }})</p>
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
                    @if ($disposisiSuratKeluar_day->count() >0)
                    @foreach ($disposisiSuratKeluar_day as $no => $item)
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
            <div class="my-auto ml-auto">
                {{ $disposisiSuratKeluar_day->links() }}
            </div>
        </div>
    </div>
</div>
@endsection