<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Fine Dining</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body {
                font-family: 'Inter', sans-serif;
            }
            .restaurant-font {
                font-family: 'Playfair Display', serif;
            }
            .restaurant-gradient {
                background: linear-gradient(135deg, #1a1a1a 0%, #2d1b1b 50%, #1a1a1a 100%);
            }
            .restaurant-card {
                background: rgba(255, 255, 255, 0.98);
                backdrop-filter: blur(10px);
                box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            }
            .restaurant-accent {
                color: #c9a961;
            }
            .restaurant-bg-accent {
                background-color: #c9a961;
            }
            .restaurant-bg-accent:hover {
                background-color: #b8964f;
            }
            .restaurant-input {
                border: 1px solid #e5e5e5;
                transition: all 0.3s ease;
            }
            .restaurant-input:focus {
                border-color: #c9a961;
                box-shadow: 0 0 0 3px rgba(201, 169, 97, 0.1);
                outline: none;
            }
            .focus-ring-restaurant:focus {
                outline: none;
                border-color: #c9a961;
                box-shadow: 0 0 0 3px rgba(201, 169, 97, 0.1);
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 restaurant-gradient relative overflow-hidden">
            <!-- Decorative background elements -->
            <div class="absolute inset-0 opacity-5">
                <div class="absolute top-20 left-20 w-64 h-64 border-2 border-white rounded-full"></div>
                <div class="absolute bottom-20 right-20 w-96 h-96 border-2 border-white rounded-full"></div>
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 border-2 border-white rounded-full"></div>
            </div>
            
            <div class="relative z-10 text-center mb-8">
                <a href="/" class="inline-block">
                    <h1 class="restaurant-font text-4xl sm:text-5xl font-bold text-white mb-2 tracking-wide">
                        Gourmet Haven
                    </h1>
                    <div class="w-24 h-1 restaurant-bg-accent mx-auto"></div>
                    <p class="text-gray-300 text-sm mt-3 tracking-widest uppercase">Fine Dining Experience</p>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-8 py-10 restaurant-card overflow-hidden sm:rounded-2xl relative z-10">
                {{ $slot }}
            </div>
            
            <div class="relative z-10 mt-8 text-center">
                <p class="text-gray-400 text-sm">© {{ date('Y') }} {{ config('app.name', 'Restaurant') }}. All rights reserved.</p>
            </div>
        </div>
    </body>
</html>
