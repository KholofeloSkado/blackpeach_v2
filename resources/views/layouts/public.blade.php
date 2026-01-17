{{-- resources/views/layouts/public.blade.php --}}
<!doctype html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#0a0a0f">

  <title>@yield('title', 'Blackpeach — Systems. Clarity. Growth.')</title>
  <meta name="description" content="@yield('meta_description', 'We design and build digital systems that convert — without noise. Websites, automation, and operational structure for owner-led businesses.')">

  <link rel="icon" href="{{ asset('favicon.ico') }}">
  <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Blackpeach">
  <meta property="og:title" content="@yield('og_title', 'Blackpeach — Systems. Clarity. Growth.')">
  <meta property="og:description" content="@yield('og_description', 'We design and build digital systems that convert — without noise.')">
  <meta property="og:image" content="{{ asset('og.jpg') }}">
  <meta name="twitter:card" content="summary_large_image">

  {{-- Tailwind CDN --}}
  <script src="https://cdn.tailwindcss.com"></script>

  {{-- Inter --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <style>
    html, body { font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif; }
    .bp-grid-bg {
      background-image:
        linear-gradient(to right, rgba(2,6,23,0.05) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(2,6,23,0.05) 1px, transparent 1px);
      background-size: 48px 48px;
    }
    /* optional helper for reveal */
    .reveal { opacity: 0; transform: translateY(12px); transition: all .6s ease; }
    .reveal.is-visible { opacity: 1; transform: translateY(0); }
  </style>

  {{-- IMPORTANT: renders @push('styles') --}}
  @stack('styles')

  {{-- keep if you want a generic head stack --}}
  @stack('head')
</head>

<body class="min-h-screen bg-white text-slate-900">
  {{-- Navbar --}}
  @includeIf('components.navbar')

  {{-- Page Loader Overlay --}}
  <div id="page-loader" class="fixed inset-0 z-[9999] hidden items-center justify-center">
    <div class="absolute inset-0 bg-white/85 backdrop-blur-sm"></div>

    <div class="relative rounded-2xl border border-bp-gray-200 bg-white px-8 py-6 shadow-2xl">
      <div class="flex items-center gap-3">
        <div class="honeycomb-spinner" aria-hidden="true">
          @includeIf('partials.svg.honeycomb-spinner')
        </div>
        <div>
          <div class="text-sm font-semibold text-bp-black">Loading…</div>
          <div class="text-xs text-bp-gray-500">Just a moment.</div>
        </div>
      </div>
    </div>
  </div>

  {{-- Page content --}}
  <main>
    @yield('content')
  </main>
    <a href="https://wa.me/27844551871?text=Hi%20Blackpeach,%20I'd%20like%20to%20chat%20about%20a%20digital%20project."
    class="fixed right-0 top-1/2 -translate-y-1/2 z-50 flex items-center gap-3 px-5 py-3 rounded-l-2xl font-bold text-white transition-all duration-300 bg-emerald-500 hover:bg-emerald-600 hover:pl-8 shadow-[0_10px_40px_rgba(16,185,129,0.4)] group"
    target="_blank">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6 animate-pulse">
            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
        </svg>
        <span class="hidden md:inline">WhatsApp Us</span>
    </a>
  {{-- Footer --}}
  @includeIf('components.footer')

  {{-- Page scripts --}}
  @stack('scripts')

  {{-- Loader script MUST be after #page-loader exists --}}
  <script>
    (() => {
      const loader = document.getElementById('page-loader');
      if (!loader) return;

      const show = () => {
        loader.classList.remove('hidden');
        loader.classList.add('flex');
      };

      const hide = () => {
        loader.classList.add('hidden');
        loader.classList.remove('flex');
      };

      const isInternal = (a) => {
        try {
          const url = new URL(a.href, window.location.href);
          return url.origin === window.location.origin;
        } catch { return false; }
      };

      document.addEventListener('click', (e) => {
        const a = e.target.closest('a');
        if (!a) return;

        if (a.target === '_blank') return;
        if (a.hasAttribute('download')) return;
        const href = a.getAttribute('href') || '';
        if (href.startsWith('#')) return;
        if (href.startsWith('mailto:') || href.startsWith('tel:')) return;
        if (!isInternal(a)) return;

        show();
      });

      document.addEventListener('submit', (e) => {
        const form = e.target;
        if (!(form instanceof HTMLFormElement)) return;
        show();
      });

      // back/forward cache
      window.addEventListener('pageshow', hide);
    })();
  </script>

  {{-- Reveal-on-scroll (no frameworks) --}}
  <script>
    (() => {
      if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

      const els = document.querySelectorAll('.reveal');
      if (!('IntersectionObserver' in window)) {
        els.forEach(el => el.classList.add('is-visible'));
        return;
      }

      const io = new IntersectionObserver((entries) => {
        entries.forEach(e => {
          if (e.isIntersecting) e.target.classList.add('is-visible');
        });
      }, { threshold: 0.15 });

      els.forEach(el => io.observe(el));
    })();
  </script>
</body>
</html>
