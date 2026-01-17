<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    {{-- Dynamic Title for Web Design & Infrastructure --}}
    <title>@yield('title', 'Blackpeach — Web Design, Managed Hosting & Business Automation')</title>
    
    {{-- Strategic Keyword Injection for SEO --}}
    <meta name="description" content="@yield('meta_description', 'Professional web designer and managed hosting services. We handle DNS registration, email setup, and full-stack web app development for SMEs in Middelburg, eMalahleni, and Polokwane.')">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Icon Fix: Standardized to Public Folder Assets --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/1.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/1.png') }}">

    {{-- Open Graph / Social SEO --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'Blackpeach — Systems. Clarity. Growth.')">
    <meta property="og:description" content="From DNS registration to custom Web App development. Complete digital systems for service businesses.">
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">

    {{-- Granular Local SEO: SME Hub Focus --}}
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "ProfessionalService",
      "name": "Blackpeach Consulting",
      "image": "{{ asset('images/1.png') }}",
      "url": "{{ config('app.url') }}",
      "telephone": "+27844551871",
      "address": {
        "@type": "PostalAddress",
        "addressCountry": "ZA",
        "addressRegion": "Gauteng",
        "addressLocality": "Johannesburg"
      },
      "serviceType": [
        "Web Design",
        "DNS Registration",
        "Managed Web Hosting",
        "Professional Email Setup",
        "Search Engine Business Setup",
        "Web App Development"
      ],
      "areaServed": [
        { "@type": "City", "name": "Middelburg", "description": "High-growth SME hub in Nkangala" },
        { "@type": "City", "name": "eMalahleni", "description": "Industrial service center" },
        { "@type": "City", "name": "Polokwane", "description": "Limpopo service business corridor" },
        { "@type": "City", "name": "Bloemfontein", "description": "Free State professional node" }
      ],
      "priceRange": "ZAR"
    }
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="min-h-screen bg-white text-slate-900 antialiased">
    
    <x-navbar />

    <main class="min-h-[70vh]">
        {{ $slot ?? '' }}
        @yield('content')
    </main>

    {{-- Global WhatsApp Trigger --}}
    <a href="https://wa.me/27844551871?text=Hi%20Blackpeach,%20I'd%20like%20to%20chat%20about%20web%20design%20and%20hosting%20setup."
       class="fixed right-0 top-1/2 -translate-y-1/2 z-50 flex items-center gap-3 px-5 py-3 rounded-l-2xl font-bold text-white transition-all duration-300 bg-emerald-500 hover:bg-emerald-600 hover:pl-8 shadow-2xl group"
       target="_blank" rel="noopener noreferrer">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6 animate-pulse">
            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
        </svg>
        <span class="hidden md:inline">WhatsApp Us</span>
    </a>

    <x-footer />

    @stack('scripts')
</body>
</html>