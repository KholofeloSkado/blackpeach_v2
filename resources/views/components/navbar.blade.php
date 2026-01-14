@php
  $links = [
    ['label' => 'Our Approach', 'route' => 'approach'],
    ['label' => 'Systems', 'route' => 'systems'],
    ['label' => 'How It Works', 'route' => 'how-it-works'],
    ['label' => 'Why Blackpeach', 'route' => 'why'],
  ];

  // Helper to detect active route (works best if you use named routes)
  $isActive = function (string $routeName) {
    return request()->routeIs($routeName) || request()->routeIs($routeName . '.*');
  };
@endphp

<header class="sticky top-0 z-50 border-b border-slate-200 bg-white/80 backdrop-blur">
  <nav class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4">
    {{-- Brand --}}
    <a href="{{ route('home') }}" class="flex items-center gap-2">
      <img src="{{ asset('images/logo-mark.png') }}" alt="Blackpeach" class="h-7 w-7">
      <span class="text-lg font-semibold tracking-tight">Blackpeach</span>
    </a>

    {{-- Desktop nav --}}
    <div class="hidden items-center gap-8 md:flex">
      @foreach ($links as $link)
        <a
          href="{{ route($link['route']) }}"
          class="text-sm font-medium transition
            {{ $isActive($link['route'])
              ? 'text-slate-900'
              : 'text-slate-500 hover:text-slate-900' }}"
        >
          {{ $link['label'] }}
        </a>
      @endforeach
    </div>

    {{-- Desktop CTA --}}
    <div class="hidden md:block">
      <a
        href="{{ route('systems') }}"
        class="inline-flex items-center rounded-md bg-red-700 px-5 py-2.5 text-sm font-semibold text-white
               shadow-sm transition hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-500"
      >
        View Systems
      </a>
    </div>

    {{-- Mobile menu button (Alpine) --}}
    <div class="md:hidden" x-data="{ open: false }">
      <button
        type="button"
        @click="open = !open"
        class="inline-flex items-center justify-center rounded-md border border-slate-200 p-2 text-slate-700
               hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-red-500"
        aria-label="Open menu"
      >
        {{-- icon --}}
        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
             viewBox="0 0 24 24" stroke="currentColor" style="display:none;">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>

      {{-- Mobile dropdown --}}
      <div
        x-show="open"
        @click.outside="open = false"
        x-transition
        class="absolute left-0 right-0 top-[72px] border-b border-slate-200 bg-white shadow-sm"
        style="display:none;"
      >
        <div class="mx-auto max-w-7xl px-4 py-4">
          <div class="flex flex-col gap-2">
            @foreach ($links as $link)
              <a
                href="{{ route($link['route']) }}"
                class="rounded-md px-3 py-2 text-sm font-medium transition
                  {{ $isActive($link['route'])
                    ? 'bg-slate-100 text-slate-900'
                    : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}"
              >
                {{ $link['label'] }}
              </a>
            @endforeach

            <a
              href="{{ route('systems') }}"
              class="mt-3 inline-flex items-center justify-center rounded-md bg-red-700 px-4 py-2.5 text-sm font-semibold text-white
                     shadow-sm transition hover:bg-red-800"
            >
              View Systems
            </a>
          </div>
        </div>
      </div>
    </div>
  </nav>
</header>
