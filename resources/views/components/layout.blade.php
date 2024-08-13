<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title }}</title>

    
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
        @vite('resources/js/app.js')
    </head>
    <body class="relative font-sans antialiased  h-screen">
        <div class="flex justify-between items-center px-24 py-8">
            <div class="text-4xl font-medium text-slate-700">
                ApplyJob
            </div>
            <div class="">
                <a href="{{route('form')}}">
                <button class='bg-[#ff532a] text-white px-6 py-2 rounded text-lg'>
                    Apply Now
                </button>
                 </a>
            </div>
        </div>

        <div class="px-24 py-6"> 
            {{ $slot }}
        </div>

    </body>
</html>
