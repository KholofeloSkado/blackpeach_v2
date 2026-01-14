<!DOCTYPE html>
<html lang="en">
<head>
    <title>Thank You — Blackpeach</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
        <div class="max-w-3xl mx-auto">
            <div class="bg-white rounded-2xl border border-bp-gray-200 shadow-sm overflow-hidden">
                <div class="px-8 py-6 bg-bp-black">
                    <h1 class="text-lg font-semibold text-white">Thank you</h1>
                    <p class="text-sm text-bp-gray-400 mt-1">We’ve received your request</p>
                </div>

                <div class="p-10 text-center">
                    <div class="w-16 h-16 mx-auto rounded-2xl bg-bp-gray-100 border border-bp-gray-200 flex items-center justify-center">
                        <svg class="w-8 h-8 text-bp-red" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>

                    <h2 class="mt-6 text-3xl font-bold tracking-tight text-bp-black">
                        Confirmed.
                    </h2>

                    <p class="mt-3 text-bp-gray-600 text-lg">
                        If email was provided, your requirements PDF is on its way.
                        We’ll contact you within 24 hours on business days.
                    </p>

                    <div class="mt-10 grid sm:grid-cols-2 gap-4 text-left">
                        <div class="p-5 bg-bp-gray-50 rounded-xl border border-bp-gray-100">
                            <div class="text-sm font-semibold text-bp-black">What happens next</div>
                            <ul class="mt-2 text-sm text-bp-gray-600 space-y-1">
                                <li>• Review your PDF requirements</li>
                                <li>• Reply with changes if needed</li>
                                <li>• We schedule the build kickoff</li>
                            </ul>
                        </div>

                        <div class="p-5 bg-bp-gray-50 rounded-xl border border-bp-gray-100">
                            <div class="text-sm font-semibold text-bp-black">Need urgent help?</div>
                            <p class="mt-2 text-sm text-bp-gray-600">
                                Send us a message with “URGENT” in the subject and we’ll prioritize.
                            </p>
                        </div>
                    </div>

                    <div class="mt-10 flex flex-col sm:flex-row gap-3 justify-center">
                        <a href="/" class="inline-flex items-center justify-center rounded-xl bg-bp-black text-white px-6 py-3 font-semibold hover:bg-bp-gray-900 transition">
                            Back to home
                        </a>
                        <a href="/pricing" class="inline-flex items-center justify-center rounded-xl border border-bp-gray-200 bg-white text-bp-black px-6 py-3 font-semibold hover:bg-bp-gray-50 transition">
                            View pricing
                        </a>
                    </div>

                    <p class="mt-8 text-xs text-bp-gray-500">
                        Used only to respond to your enquiry.
                        <a href="/privacy" class="text-bp-red hover:underline">Privacy Policy</a>
                    </p>
                </div>
            </div>

            <!-- Footer -->
            <footer class="mt-16 pt-8 border-t border-bp-gray-100">
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

    </div>
</main>
</body>
</html>
