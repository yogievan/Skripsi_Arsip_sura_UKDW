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
                    Nominal Surat
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
                    Nominal Surat
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
                    Nominal Surat
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
                    Nominal Surat
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
                data: [5, 1, 1, 2, 3, 5,5, 1, 1, 2, 3, 5],
                color: "#0000ff",
            },
            {
                name: "Arsip Surat Keluar",
                data: [1, 2, 4, 7, 1, 6, 1, 2, 4, 7, 1, 6],
                color: "#ff9933",
            },
            {
                name: "Disposisi Arsip Surat Masuk",
                data: [1, 8, 4, 5, 6, 6,1, 8, 4, 5, 6, 6],
                color: "#ff0000",
            },
            {
                name: "Disposisi Arsip Surat Keluar",
                data: [3, 3, 6, 2, 3, 1,3, 3, 6, 2, 3, 1],
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
            show: true,
            labels: {
                formatter: function (value) {
                    return value + ' Surat';
                }
            },
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
            series: [25, 25, 25, 25],
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
@endsection