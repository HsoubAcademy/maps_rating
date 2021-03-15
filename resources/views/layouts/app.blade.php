<!DOCTYPE html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Font Awesome -->
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" >
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="" crossorigin=""/>

        @livewireStyles

        <!-- Scripts -->
	<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    </head>
    <body class="antialiased">
        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-dropdown')  

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <footer class="flex justify-center p-5 ">
            <a href="https://academy.hsoub.com" class="justify-self-center">
                <img class="w-24"  src="https://academy.hsoub.com/uploads/monthly_2016_01/SiteLogo-346x108.png.dd3bdd5dfa0e4a7099ebc51f8484032e.png" alt="أكاديمية حسوب">
            </a>
        </footer>


        @stack('modals')

        @livewireScripts

        <script>
            $(function(){
                $('#address').on('keyup', function() {
                    var address = $(this).val();
                    $('#address-list').fadeIn(); 
                    $.ajax({
                        url: "{{ route('auto-complete') }}",
                        type: "GET",
                        data: {"address" : address }
                    }).done(function(data) {
                        $("#address-list").html(data);
                    });
                });
                $('#address-list').on('click', 'li', function(){  
                    $('#address').val($(this).text());  
                    $('#address-list').fadeOut();  
                }); 
            });
        </script>

    </body>
</html>
