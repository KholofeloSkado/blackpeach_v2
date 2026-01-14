<!DOCTYPE html>
<html lang="en">
<head>
    <title>Confirm — Blackpeach</title>
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

        <!-- Header -->
        <header class="flex items-center justify-between mb-16">
            <a href="/" class="flex items-center gap-3 group">
                <img src="{{ asset('brand/blackpeach_logo.png') }}" alt="Blackpeach" class="h-10 w-auto">
                <span class="text-xl font-bold tracking-tight text-bp-black">Blackpeach</span>
            </a>

            <nav class="flex items-center gap-8">
                <a href="/pricing" class="text-sm font-medium text-bp-gray-600 hover:text-bp-black transition-colors">
                    Pricing
                </a>
            </nav>
        </header>

        <!-- Main Content -->
        <div class="grid lg:grid-cols-2 gap-16 lg:gap-20 items-start">
            <!-- Left Column -->
            <section class="lg:sticky lg:top-12">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-bp-gray-100 rounded-full mb-6">
                    <span class="w-1.5 h-1.5 bg-bp-red rounded-full"></span>
                    <span class="text-xs font-medium text-bp-gray-600 uppercase tracking-wider">Confirmation</span>
                </div>

                <h1 class="text-4xl lg:text-5xl font-bold tracking-tight text-bp-black leading-[1.1]">
                    Confirm your<br>
                    <span class="text-bp-red">requirements.</span>
                </h1>

                <p class="mt-6 text-lg text-bp-gray-600 leading-relaxed max-w-md">
                    Review your selected package and extras. Once confirmed, we generate your requirements PDF and send it to you.
                </p>

                <div class="mt-10 space-y-4">
                    <div class="flex items-start gap-4 p-5 bg-bp-gray-50 rounded-xl border border-bp-gray-100">
                        <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center border border-bp-gray-100 flex-shrink-0">
                            <svg class="w-5 h-5 text-bp-red" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm font-semibold text-bp-black">Private by default</div>
                            <div class="text-sm text-bp-gray-500 mt-0.5">Used only to deliver your quote and follow up.</div>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-5 bg-bp-gray-50 rounded-xl border border-bp-gray-100">
                        <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center border border-bp-gray-100 flex-shrink-0">
                            <svg class="w-5 h-5 text-bp-red" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6l4 2"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm font-semibold text-bp-black">Fast turnaround</div>
                            <div class="text-sm text-bp-gray-500 mt-0.5">PDF generated immediately after confirmation.</div>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-5 bg-bp-gray-50 rounded-xl border border-bp-gray-100">
                        <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center border border-bp-gray-100 flex-shrink-0">
                            <svg class="w-5 h-5 text-bp-red" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm font-semibold text-bp-black">Next step</div>
                            <div class="text-sm text-bp-gray-500 mt-0.5">We contact you within 24 hours.</div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Right Column -->
            <section>
                <div class="bg-white rounded-2xl border border-bp-gray-200 shadow-sm overflow-hidden">
                    <div class="px-8 py-6 bg-bp-black">
                        <h2 class="text-lg font-semibold text-white">Review & Confirm</h2>
                        <p class="text-sm text-bp-gray-400 mt-1">Adjust package/extras before generating your PDF</p>
                    </div>

                    <div class="p-8">
                        @livewire('public.lead-confirmation', ['lead_id' => $lead->id])
                    </div>
                </div>

                <p class="mt-6 text-center text-xs text-bp-gray-500">
                    By confirming, you agree we may contact you about this enquiry.
                    <a href="/privacy" class="text-bp-red hover:underline">Privacy Policy</a>
                </p>
            </section>
        </div>

        <!-- Footer -->
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
