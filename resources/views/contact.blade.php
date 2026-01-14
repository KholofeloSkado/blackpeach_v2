<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact — Blackpeach</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @livewireStyles
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'system-ui', 'sans-serif'],
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
        .bp-grid-bg {
            background-image:
                linear-gradient(rgba(0, 0, 0, 0.02) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 0, 0, 0.02) 1px, transparent 1px);
            background-size: 32px 32px;
        }
        .bp-focus:focus {
            outline: none;
            border-color: #B10000;
            box-shadow: 0 0 0 3px rgba(177, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-white text-bp-gray-900 antialiased font-sans">
<main class="min-h-screen bp-grid-bg">
    <div class="max-w-6xl mx-auto px-6 py-8 lg:py-12">

        <header class="flex items-center justify-between mb-16">
            <a href="/" class="flex items-center gap-3 group">
                <img src="{{ asset('brand/blackpeach_logo.png') }}" alt="Blackpeach" class="h-10 w-auto">
                <span class="text-xl font-bold tracking-tight text-bp-black">Blackpeach</span>
            </a>

            <nav class="flex items-center gap-8">
                <a href="/pricing" class="text-sm font-medium text-bp-gray-600 hover:text-bp-black transition-colors">
                    Pricing
                </a>

                {{-- Enable only when route exists --}}
                {{--
                <a href="/systems" class="text-sm font-medium text-white bg-bp-red hover:bg-bp-red-dark px-5 py-2.5 rounded-lg transition-colors">
                    View Systems
                </a>
                --}}
            </nav>
        </header>

        <div class="grid lg:grid-cols-2 gap-16 lg:gap-20 items-start">
            <section class="lg:sticky lg:top-12">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-bp-gray-100 rounded-full mb-6">
                    <span class="w-1.5 h-1.5 bg-bp-red rounded-full"></span>
                    <span class="text-xs font-medium text-bp-gray-600 uppercase tracking-wider">Contact</span>
                </div>

                <h1 class="text-4xl lg:text-5xl font-bold tracking-tight text-bp-black leading-[1.1]">
                    Systems. Clarity.<br>
                    <span class="text-bp-red">Growth.</span>
                </h1>

                <p class="mt-6 text-lg text-bp-gray-600 leading-relaxed max-w-md">
                    We design and build digital systems that convert — without noise.
                    Start with your details. You’ll confirm requirements next.
                </p>

                <div class="mt-10 space-y-4">
                    <div class="flex items-start gap-4 p-5 bg-bp-gray-50 rounded-xl border border-bp-gray-100">
                        <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center border border-bp-gray-100 flex-shrink-0">
                            <svg class="w-5 h-5 text-bp-red" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm font-semibold text-bp-black">Response time</div>
                            <div class="text-sm text-bp-gray-500 mt-0.5">Within 24 hours on business days</div>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-5 bg-bp-gray-50 rounded-xl border border-bp-gray-100">
                        <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center border border-bp-gray-100 flex-shrink-0">
                            <svg class="w-5 h-5 text-bp-red" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm font-semibold text-bp-black">No obligation</div>
                            <div class="text-sm text-bp-gray-500 mt-0.5">Consultation is free. No pressure.</div>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-5 bg-bp-gray-50 rounded-xl border border-bp-gray-100">
                        <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center border border-bp-gray-100 flex-shrink-0">
                            <svg class="w-5 h-5 text-bp-red" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm font-semibold text-bp-black">Direct access</div>
                            <div class="text-sm text-bp-gray-500 mt-0.5">You’ll speak with decision-makers, not sales.</div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="bg-white rounded-2xl border border-bp-gray-200 shadow-sm overflow-hidden">
                    <div class="px-8 py-6 bg-bp-black">
                        <h2 class="text-lg font-semibold text-white">Start a conversation</h2>
                        <p class="text-sm text-bp-gray-400 mt-1">Tell us about your business</p>
                    </div>

                    <div class="p-8">
                        @livewire('public.lead-form')
                    </div>
                </div>

                <p class="mt-6 text-center text-xs text-bp-gray-500">
                    Used only to respond to your enquiry.
                    <a href="/privacy" class="text-bp-red hover:underline">Privacy Policy</a>
                </p>
            </section>
        </div>

        <footer class="mt-20 pt-8 border-t border-bp-gray-100">
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                <p class="text-sm text-bp-gray-400">
                    © {{ date('Y') }} Blackpeach Consulting. All rights reserved.
                </p>
                <div class="flex items-center gap-6">
                    <a href="/privacy" class="text-sm text-bp-gray-400 hover:text-bp-black transition-colors">Privacy</a>
                    <a href="/terms" class="text-sm text-bp-gray-400 hover:text-bp-black transition-colors">Terms</a>
                </div>
            </div>
        </footer>

    </div>
</main>

@livewireScripts
</body>
</html>
