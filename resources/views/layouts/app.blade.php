<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>  
            </header>   

            <!-- Page Content -->
            <main>
                @if (session('success'))
                <div x-data="{ show: true }" x-show="show"
                    class="flex justify-between items-center bg-green-200 relative text-green-600 py-3 px-3 rounded-lg">
                    <div>   
                        <span class="font-semibold text-green-700">{{ session('success') }}</span>
                    </div>      
                    <div>
                        <button type="button" @click="show = false" class=" text-green-700">
                            <span class="text-2xl">&times;</span>
                        </button>   
                    </div>      
                </div>
                @endif 
            
                @if (session('error'))
                <div x-data="{ show: true }" x-show="show"
                    class="flex justify-between items-center bg-red-200 relative text-red-600 py-3 px-3 rounded-lg">
                    <div>   
                        <span class="font-semibold text-red-700">{{ session('error') }}</span>
                    </div>  
                    <div>
                        <button type="button" @click="show = false" class=" text-red-700">
                            <span class="text-2xl">&times;</span>
                        </button>   
                    </div>      
                </div>  
                @endif      
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
