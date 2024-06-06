<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('web_title', 'Tanpa Judul')
    </title>
    @vite(['resources/css/app.css','resources/js/app.js'])

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    {{-- fontawesome css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    
    {{-- font poppins --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital@0;1&display=swap" rel="stylesheet">

    {{-- favicon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    
    <!-- include summernote css/js -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
</head>
<body>
    <div class="grid">
        <div class="flex">
            <div class="w-[300px]">
                {{-- Sidebar --}}
                <aside class="bg-[#006B3F] border-gray-700 text-white h-[100%] p-4">
                    <div class="flex gap-1">
                        <img class="w-[3rem] h-[3.75rem] mr-2 my-auto" src="../assets/img/UKDW.png" alt="UKDW">
                        <h1 class="text-xl font-semibold my-auto">
                            ARSIP SURAT
                        </h1>
                    </div>
                    <p class="font-semibold text-[24px] my-3">MENU</p>
                    <nav>
                        <ul class="mt-5">
                            @yield('menu')
                        </ul>
                    </nav>
                </aside>
            </div>
            <div class="w-[100%] m-3">
                {{-- Header --}}
                @include('layouts.header')

                {{-- Main Content --}}
                <main>
                    {{-- optional content --}}
                    @yield('optional_content')

                    {{-- content 2 --}}
                    <div class="bg-white rounded-md border shadow mt-5 p-4 min-h-[670px]">
                        {{-- content components --}}
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>
        <div>
            {{-- Footer --}}
            @include('layouts.footer')
        </div>
    </div>

    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
</body>
</html>