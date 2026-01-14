{{-- resources/views/layouts/public.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('title', 'Blackpeach')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Livewire styles --}}
    @livewireStyles

    {{-- Tailwind CDN (since prod cannot install Tailwind) --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Tailwind config + global site styles (ONE place) --}}
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Inter', 'system-ui', 'sans-serif'],
                    },
                    colors: {
                        'bp-red': '#B10000',
                        'bp-red-dark': '#8a0000',
                        'bp-black': '#0a0a0f',
                        'bp-gray': {
                            50: '#fafafa',
                            100: '#f5f5f5',
                            200: '#e5e5e5',
                            300: '#d4d4d4',
                            400: '#a3a3a3',
                            500: '#737373',
                            600: '#525252',
                            700: '#404040',
                            800: '#262626',
                            900: '#171717',
                        }
                    }
                }
            }
        }
    </script>

    <style>
        /* Subtle grid background */
        .bp-grid-bg {
            background-image:
                linear-gradient(rgba(0, 0, 0, 0.02) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 0, 0, 0.02) 1px, transparent 1px);
            background-size: 32px 32px;
        }

        /* Focus ring */
        .bp-focus:focus {
            outline: none;
            border-color: #B10000;
            box-shadow: 0 0 0 3px rgba(177, 0, 0, 0.10);
        }

        /* Fade in animation */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-in-up { animation: fadeInUp 0.6s ease-out forwards; }
        .animate-delay-100 { animation-delay: 0.1s; opacity: 0; }
        .animate-delay-200 { animation-delay: 0.2s; opacity: 0; }
        .animate-delay-300 { animation-delay: 0.3s; opacity: 0; }
        .animate-delay-400 { animation-delay: 0.4s; opacity: 0; }

        /* Pulse animation for badge dot */
        @keyframes pulse-dot {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        .pulse-dot { animation: pulse-dot 2s cubic-bezier(0.4, 0, 0.6, 1) infinite; }
    </style>

    @stack('head')
</head>

<body class="bg-white text-bp-gray-900 antialiased font-sans">
    <x-navbar />

    <main>
        @yield('content')
    </main>

    <x-footer />

    @livewireScripts
    @stack('scripts')
</body>
</html>
