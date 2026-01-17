{{-- resources/views/pages/home.blade.php --}}
@extends('layouts.public')

@section('title', 'Blackpeach — Systems. Clarity. Growth.')
@section('meta_description', 'Custom online visibility, booking systems, lead management, client portals, and automation that make service businesses and startups look professional and convert.')

@push('styles')
<style>

    /* Card Flip Logic */
.perspective-1000 {
    perspective: 1000px;
}
.flip-card-inner {
    position: relative;
    width: 100%;
    height: 100%;
    transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    transform-style: preserve-3d;
}
.perspective-1000:hover .flip-card-inner {
    transform: rotateY(180deg);
}
.flip-card-front, .flip-card-back {
    position: absolute;
    width: 100%;
    height: 100%;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    border-radius: 18px;
}
.flip-card-back {
    transform: rotateY(180deg);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}


        /* Fade in animation */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in-up {
        animation: fadeInUp 1.0s ease-out forwards;
    }

    .animate-delay-100 {
        animation-delay: 0.1s;
        opacity: 0;
    }

    .animate-delay-200 {
        animation-delay: 0.2s;
        opacity: 0;
    }

    .animate-delay-300 {
        animation-delay: 0.3s;
        opacity: 0;
    }

    .animate-delay-400 {
        animation-delay: 0.4s;
        opacity: 0;
    }

    /* Pulse animation for badge dot */
    @keyframes pulse-dot {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: 0.5;
        }
    }

    .pulse-dot {
        animation: pulse-dot 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
 /* ========= Premium motion layer (subtle, classy) ========= */
@media (prefers-reduced-motion: no-preference) {
  /* Reveal variants */
  .reveal-up { opacity: 0; transform: translateY(18px); transition: opacity .7s ease, transform .7s ease; }
  .reveal-up.is-visible { opacity: 1; transform: translateY(0); }

  .reveal-right { opacity: 0; transform: translateX(18px); transition: opacity .7s ease, transform .7s ease; }
  .reveal-right.is-visible { opacity: 1; transform: translateX(0); }

  .reveal-scale { opacity: 0; transform: translateY(10px) scale(.98); transition: opacity .7s ease, transform .7s ease; }
  .reveal-scale.is-visible { opacity: 1; transform: translateY(0) scale(1); }

  /* Stagger helpers */
  .delay-100 { transition-delay: .10s; }
  .delay-200 { transition-delay: .20s; }
  .delay-300 { transition-delay: .30s; }
  .delay-400 { transition-delay: .40s; }
  .delay-500 { transition-delay: .50s; }

  /* Button micro-interactions (dopamine, not childish) */
  .bp-btn {
    transition: transform .18s ease, box-shadow .18s ease, filter .18s ease;
    will-change: transform;
  }
  .bp-btn:hover { transform: translateY(-1px); box-shadow: 0 18px 35px rgba(0,0,0,.18); }
  .bp-btn:active { transform: translateY(0) scale(.98); }

  /* Card lift */
  .bp-lift { transition: transform .22s ease, box-shadow .22s ease, border-color .22s ease; }
  .bp-lift:hover { transform: translateY(-3px); box-shadow: 0 24px 60px rgba(2,6,23,.14); border-color: rgba(177,0,0,.25); }

  /* CTA “active” glow (slow) */
  @keyframes ctaGlow {
    0%,100% { box-shadow: 0 0 0 rgba(0,0,0,0); }
    50% { box-shadow: 0 28px 90px rgba(177,0,0,.28); }
  }
  .cta-glow { animation: ctaGlow 5.5s ease-in-out infinite; }

  /* Honeycomb watermark drift (super subtle) */
  @keyframes watermarkDrift {
    0%,100% { transform: translate3d(0,0,0) rotate(0deg); opacity: .10; }
    50% { transform: translate3d(-10px,8px,0) rotate(-1deg); opacity: .14; }
  }
  .honey-watermark { animation: watermarkDrift 8s ease-in-out infinite; }

  /* Soft sheen on primary CTA (premium) */
  .bp-sheen { position: relative; overflow: hidden; }
  .bp-sheen::after {
    content: "";
    position: absolute;
    top: -40%;
    left: -60%;
    width: 60%;
    height: 180%;
    transform: rotate(18deg);
    background: linear-gradient(90deg, transparent, rgba(255,255,255,.22), transparent);
    transition: left .8s ease;
  }
  .bp-sheen:hover::after { left: 120%; }
}

  /* Keep motion subtle. If you want zero motion, remove these blocks. */
  @keyframes floatSoft { 0%,100%{ transform: translateY(0) } 50%{ transform: translateY(-10px) } }
  .float-soft { animation: floatSoft 5s ease-in-out infinite; }

  @keyframes pulseRing { 0%{ transform: scale(1); opacity:1 } 100%{ transform: scale(1.35); opacity:0 } }
  .pulse-dot { position:relative; }
  .pulse-dot::before {
    content:'';
    position:absolute; inset:0;
    border-radius:9999px;
    background:#B10000;
    animation:pulseRing 2.2s cubic-bezier(.4,0,.6,1) infinite;
    opacity:.9;
  }

  .bp-card { border:1px solid #e5e7eb; border-radius: 18px; background:#fff; }
  .bp-soft { background:#f9fafb; }


  @media (prefers-reduced-motion: no-preference) {
    .reveal { opacity: 0; transform: translateY(18px); transition: opacity .6s ease, transform .6s ease; }
    .reveal.is-visible { opacity: 1; transform: translateY(0); }
  }

</style>
@endpush

@section('content')

{{-- HERO --}}
<section class="relative min-h-[92vh] flex items-center pt-12 pb-20 bg-gradient-to-b from-white to-gray-50 overflow-hidden">
  {{-- Honeycomb patterns --}}
  <div class="absolute inset-0 overflow-hidden pointer-events-none">
    <div class="absolute top-10 right-0 w-[520px] h-[520px] opacity-[0.04] float-soft animate-fade-in-up">
      <svg viewBox="0 0 200 200" class="w-full h-full">
        <defs>
          <pattern id="hexPattern" x="0" y="0" width="40" height="46" patternUnits="userSpaceOnUse">
            <polygon points="20,0 40,11.5 40,34.5 20,46 0,34.5 0,11.5" fill="none" stroke="#B10000" stroke-width="1.5"/>
          </pattern>
        </defs>
        <rect width="200" height="200" fill="url(#hexPattern)"/>
      </svg>
    </div>

    <div class="absolute bottom-14 left-0 w-[420px] h-[420px] opacity-[0.035]">
      <svg viewBox="0 0 200 200" class="w-full h-full">
        <defs>
          <pattern id="hexPattern2" x="0" y="0" width="40" height="46" patternUnits="userSpaceOnUse">
            <polygon points="20,0 40,11.5 40,34.5 20,46 0,34.5 0,11.5" fill="none" stroke="#B10000" stroke-width="1.5"/>
          </pattern>
        </defs>
        <rect width="200" height="200" fill="url(#hexPattern2)"/>
      </svg>
    </div>

    <div class="absolute top-1/3 right-1/4 w-72 h-72 bg-gradient-to-br from-orange-100 to-red-50 rounded-full blur-3xl opacity-20"></div>
  </div>

  <div class="relative max-w-7xl mx-auto px-6 lg:px-8 w-full">
    <div class="grid lg:grid-cols-2 gap-12 items-center">

      {{-- Left --}}
      <div>
        {{-- Badge (red dot + light pill) --}}
        <div class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 rounded-full mb-7 shadow-sm">
          <span class="relative w-2 h-2 bg-[#B10000] rounded-full pulse-dot"></span>
          <span class="text-sm font-medium text-gray-700">Custom Systems &amp; Automation</span>
        </div>

        {{-- Headline (more “trusted agency” than hype) --}}
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight text-bp-black leading-[1.08] mb-6 animate-fade-in-up">
          Digital infrastructure that makes you look professional — and convert.
        </h1>

        <p class="text-lg md:text-xl text-gray-600 mb-9 leading-relaxed max-w-2xl">
          We build <span class="text-bp-black font-semibold">online visibility</span>, <span class="text-bp-black font-semibold">booking systems</span>,
          <span class="text-bp-black font-semibold">lead management</span>, <span class="text-bp-black font-semibold">client portals</span>,
          and <span class="text-bp-black font-semibold">automation</span> for service businesses and startups that are ready to scale.
        </p>

        {{-- CTAs --}}
        <div class="flex flex-col sm:flex-row gap-4 mb-10">
          <a href="{{ route('contact') }}"
             class="inline-flex items-center justify-center gap-2 rounded-lg bg-[#B10000] hover:bg-[#8a0000] text-white font-semibold px-8 py-4 text-base shadow-lg hover:shadow-xl transition-all">
            Apply for a Build Slot
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
          </a>

          <a href="{{ route('systems') }}"
             class="inline-flex items-center justify-center gap-2 rounded-lg bg-white hover:bg-gray-50 text-bp-black font-semibold px-8 py-4 text-base border-2 border-gray-200 hover:border-gray-300 transition-all">
            View Our Systems
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
            </svg>
          </a>
        </div>

        {{-- Trust indicators (more concrete) --}}
        <div class="grid sm:grid-cols-3 gap-4">
          <div class="bp-card p-4">
            <div class="text-xs text-gray-500 mb-1">Delivery</div>
            <div class="text-sm font-semibold text-bp-black">Once-off builds. Full ownership.</div>
          </div>
          <div class="bp-card p-4">
            <div class="text-xs text-gray-500 mb-1">Outcomes</div>
            <div class="text-sm font-semibold text-bp-black">Less manual work. Faster response.</div>
          </div>
          <div class="bp-card p-4">
            <div class="text-xs text-gray-500 mb-1">Quality</div>
            <div class="text-sm font-semibold text-bp-black">Clean UX. Reporting included.</div>
          </div>
        </div>
      </div>

      {{-- Right: premium “system preview” --}}
      <div class="relative animate-fade-in-up">
        <div class="relative bg-white rounded-2xl border-2 border-gray-200 shadow-2xl overflow-hidden ">
          <div class="bg-gradient-to-r from-[#B10000] to-red-600 p-4 flex items-center gap-3 ">
            <div class="flex gap-1.5">
              <div class="w-3 h-3 rounded-full bg-white/30"></div>
              <div class="w-3 h-3 rounded-full bg-white/30"></div>
              <div class="w-3 h-3 rounded-full bg-white/30"></div>
            </div>
            <div class="flex-1 bg-white/20 rounded px-3 py-1.5 text-white text-sm">
              dashboard.yourbusiness.co.za
            </div>
          </div>

          <div class="p-6 bg-gray-50">
            <div class="grid grid-cols-2 gap-4 mb-4">
              <div class="bg-white rounded-xl p-4 border border-gray-200">
                <div class="text-xs text-gray-500 mb-1">New leads</div>
                <div class="text-2xl font-bold text-bp-black">47</div>
                <div class="text-xs text-emerald-600 mt-1">↑ 23% this month</div>
              </div>
              <div class="bg-white rounded-xl p-4 border border-gray-200">
                <div class="text-xs text-gray-500 mb-1">Bookings</div>
                <div class="text-2xl font-bold text-bp-black">89</div>
                <div class="text-xs text-emerald-600 mt-1">↑ 12% this month</div>
              </div>
            </div>

            <div class="bg-white rounded-xl p-4 border border-gray-200">
              <div class="flex items-center justify-between mb-3">
                <div class="text-xs text-gray-500">Reporting</div>
                <div class="text-xs text-gray-400">Last 7 days</div>
              </div>
              <div class="flex items-end gap-2 h-24">
                <div class="flex-1 bg-gradient-to-t from-[#B10000] to-red-400 rounded-t" style="height: 55%;"></div>
                <div class="flex-1 bg-gradient-to-t from-[#B10000] to-red-400 rounded-t" style="height: 68%;"></div>
                <div class="flex-1 bg-gradient-to-t from-[#B10000] to-red-400 rounded-t" style="height: 82%;"></div>
                <div class="flex-1 bg-gradient-to-t from-[#B10000] to-red-400 rounded-t" style="height: 100%;"></div>
                <div class="flex-1 bg-gradient-to-t from-[#B10000] to-red-400 rounded-t" style="height: 76%;"></div>
              </div>
              <div class="mt-3 text-xs text-gray-500">Numbers you can act on — not vanity metrics.</div>
            </div>
          </div>
        </div>

        <div class="absolute -bottom-6 -right-6 bg-white rounded-xl p-4 shadow-xl border border-gray-200">
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center">
              <span class="text-emerald-700 font-bold text-sm">OK</span>
            </div>
            <div>
              <div class="text-xs text-gray-500">System status</div>
              <div class="text-sm font-bold text-bp-black">Live & automated</div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

{{-- WHO WE BUILD FOR (more premium, less cheeky) --}}
<section class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-6 lg:px-8">
    <div class="max-w-3xl mb-12">
      <div class="inline-block px-4 py-2 bg-red-50 text-[#B10000] rounded-full text-sm font-semibold mb-4">
        Who we work with
      </div>
      <h2 class="text-3xl lg:text-4xl font-bold text-bp-black mb-4">
        For businesses ready to operate like a real company
      </h2>
      <p class="text-lg text-gray-600">
        We’re a good fit when you care about customer experience, internal discipline, and conversion — not “looking busy online”.
      </p>
    </div>

    <div class="grid md:grid-cols-2 gap-6">
      <div class="bp-card p-7 rounded-2xl p-8 text-white animate-fade-in-up"
                     style="background-color: rgb(177 0 0);">
        <h3 class="text-xl font-bold text-bp-black mb-2">Service businesses</h3>
        <p class="text-white-600 mb-5">Booking, enquiry handling, client delivery — structured and automated.</p>
        <ul class="space-y-2 text-sm text-white-700">
          <li class="flex items-start gap-2"><span class="text-[#1e293b] font-bold">•</span> Booking &amp; scheduling systems</li>
          <li class="flex items-start gap-2"><span class="text-[#1e293b] font-bold">•</span> Lead capture + follow-up automation</li>
          <li class="flex items-start gap-2"><span class="text-[#1e293b] font-bold">•</span> Client portals + onboarding</li>
        </ul>
      </div>

      <div class="bp-card p-7 text-white animate-fade-in-up"
                     style="background-color: rgb(30 41 59);">
        <h3 class="text-xl font-bold text-bp-black mb-2">Startups &amp; founders</h3>
        <p class="text-white-600 mb-5">Credibility + systems that scale without chaos.</p>
        <ul class="space-y-2 text-sm text-white-700">
          <li class="flex items-start gap-2"><span class="text-[#B10000] font-bold">•</span> Online credibility that converts</li>
          <li class="flex items-start gap-2"><span class="text-[#B10000] font-bold">•</span> Lead management + pipeline visibility</li>
          <li class="flex items-start gap-2"><span class="text-[#B10000] font-bold">•</span> MVP internal tools + reporting</li>
        </ul>
      </div>
    </div>

    {{-- Not a fit line (polite, premium) --}}
    <div class="mt-8 bg-gray-50 border border-gray-200 rounded-2xl p-6">
      <div class="text-sm text-gray-700">
        <span class="font-semibold text-bp-black">Not a fit:</span> “just a website”, rushed cheap builds, or projects without the budget to implement properly.
      </div>
    </div>
  </div>
</section>

{{-- WHAT WE BUILD (your core offer list) --}}
{{-- WHAT WE BUILD --}}
<section class="py-20 bg-gradient-to-b from-gray-50 to-white">
  <div class="max-w-7xl mx-auto px-6 lg:px-8">
    <div class="text-center max-w-3xl mx-auto mb-14">
      <div class="inline-block px-4 py-2 bg-red-50 text-[#B10000] rounded-full text-sm font-semibold mb-4">
        We'll build for you:
      </div>
      <h2 class="text-3xl lg:text-5xl font-bold text-bp-black mb-5">Systems that remove friction</h2>
      <p class="text-xl text-gray-600">Not noise. Not trends. Infrastructure that earns trust and improves conversion.</p>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
      @php
        $cards = [
          ['Online visibility', 'Credibility-first web experiences that build trust quickly.', 'globe-alt', 'bg-[#B10000]'],
          ['Booking systems', 'Scheduling, payments, confirmations, and reminders.', 'calendar-days', 'bg-[#8a0000]'],
          ['Lead management', 'Capture, qualify, follow up — with a pipeline you can see.', 'user-group', 'bg-[#B10000]'],
          ['Client portals', 'A professional home for onboarding, documents, and updates.', 'rectangle-group', 'bg-[#8a0000]'],
          ['Dashboards', 'Visibility across leads, bookings, delivery, and outcomes.', 'chart-bar', 'bg-[#B10000]'],
          ['Reporting', 'Explicit reporting so you can make decisions (no guessing).', 'document-chart-bar', 'bg-[#8a0000]'],
          ['Automation', 'Follow-ups, reminders, internal routing, and handovers.', 'cpu-chip', 'bg-[#B10000]'],
          ['Integrations', 'Connect tools so data moves cleanly and automatically.', 'arrows-right-left', 'bg-[#8a0000]'],
        ];
      @endphp

      @foreach($cards as [$t, $d, $icon, $bg])
        <div class="perspective-1000 h-[220px] w-full group">
          <div class="flip-card-inner shadow-sm group-hover:shadow-2xl animate-fade-in-up">
            
            {{-- FRONT --}}
            <div class="flip-card-front bp-card p-6 flex flex-col justify-center">
              <div class="w-12 h-12 bg-gradient-to-br from-[#B10000] to-red-600 rounded-xl flex items-center justify-center mb-4">
                <span class="w-2.5 h-2.5 bg-white rounded-full"></span>
              </div>
              <h3 class="text-lg font-bold text-bp-black mb-2">{{ $t }}</h3>
              <p class="text-sm text-gray-600">{{ $d }}</p>
            </div>

            {{-- BACK --}}
            <div class="flip-card-back p-6 text-white text-center {{ $bg }}">
              {{-- Heroicon --}}
              <div class="mb-4">
                 @if($icon == 'globe-alt') <svg class="w-10 h-10 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" /></svg>
                 @elseif($icon == 'calendar-days') <svg class="w-10 h-10 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" /></svg>
                 @elseif($icon == 'user-group') <svg class="w-10 h-10 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" /></svg>
                 @elseif($icon == 'rectangle-group') <svg class="w-10 h-10 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 01-1.125-1.125v-3.75zM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-8.25zM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-2.25z" /></svg>
                 @elseif($icon == 'chart-bar') <svg class="w-10 h-10 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" /></svg>
                 @elseif($icon == 'document-chart-bar') <svg class="w-10 h-10 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9Z" /></svg>
                 @elseif($icon == 'cpu-chip') <svg class="w-10 h-10 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.25 3v1.5M4.5 8.25H3m18 0h-1.5m-15 7.5H3m18 0h-1.5m-15-7.5A2.25 2.25 0 016.75 6h10.5a2.25 2.25 0 012.25 2.25v7.5a2.25 2.25 0 01-2.25 2.25H6.75a2.25 2.25 0 01-2.25-2.25v-7.5zM15.75 9v6m-7.5 0V9m3.75 10.5V18m0-15V4.5" /></svg>
                 @elseif($icon == 'arrows-right-left') <svg class="w-10 h-10 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7.5 21L3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5" /></svg>
                 @endif
              </div>
              
              <h4 class="font-bold mb-4">Interested in {{ $t }}?</h4>
              <a href="{{ route('contact') }}" class="px-5 py-2 bg-white text-slate-600 rounded-lg text-sm font-bold hover:scale-105 transition-transform">
                Get Started →
              </a>
            </div>

          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
<hr/>
{{-- PROCESS --}}
<section class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-6 lg:px-8">
    <div class="rounded-3xl border-2 border-gray-200 bg-white p-8 lg:p-12 shadow-xl relative overflow-hidden">
      <div class="absolute top-0 right-0 w-64 h-64 opacity-[0.03] pointer-events-none">
        <svg viewBox="0 0 200 200" class="w-full h-full">
          <defs>
            <pattern id="hexPattern3" x="0" y="0" width="40" height="46" patternUnits="userSpaceOnUse">
              <polygon points="20,0 40,11.5 40,34.5 20,46 0,34.5 0,11.5" fill="none" stroke="#B10000" stroke-width="2"/>
            </pattern>
          </defs>
          <rect width="200" height="200" fill="url(#hexPattern3)"/>
        </svg>
      </div>

      <div class="relative flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 mb-10">
        <div>
          <div class="inline-block px-4 py-2 bg-red-50 text-[#B10000] rounded-full text-sm font-semibold mb-4">
            Process
          </div>
          <h2 class="text-2xl lg:text-4xl font-bold text-bp-black mb-3">Simple. Structured. Professional.</h2>
          <p class="text-gray-600 max-w-2xl">A clean flow that respects your time and gets to the point.</p>
        </div>
        <a href="{{ route('how-it-works') }}" class="inline-flex items-center text-[#B10000] hover:text-[#8a0000] font-semibold whitespace-nowrap">
          See full process →
        </a>
      </div>

      <div class="relative grid md:grid-cols-4 gap-6">
        @php
          $steps = [
            ['Apply', 'Submit your details and what you need.'],
            ['Qualify', 'We confirm fit, scope, and timeline.'],
            ['Build system', 'We build, test, and implement cleanly.'],
            ['Handover + support', 'Training, documentation, and support options.'],
          ];
        @endphp

        @foreach($steps as $i => [$t, $d])
          <div class="bg-gray-50 rounded-2xl border border-gray-200 p-6">
            <div class="w-14 h-14 bg-gradient-to-br from-[#B10000] to-red-600 rounded-xl flex items-center justify-center mb-4">
              <span class="text-2xl font-bold text-white">{{ $i + 1 }}</span>
            </div>
            <h3 class="text-lg font-bold text-bp-black mb-2">{{ $t }}</h3>
            <p class="text-sm text-gray-600">{{ $d }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

{{-- FINAL CTA --}}
<section class="py-24">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="rounded-3xl p-10 lg:p-14"
             style="background-color: rgb(177 0 0);">

            <div class="grid lg:grid-cols-2 gap-10 items-center">

                {{-- LEFT: APPLY --}}
                <div class="text-white">
                    <div class="inline-block mb-4 px-4 py-2 rounded-full text-sm font-semibold"
                         style="background-color: rgb(30 41 59);">
                        Ready when you are
                    </div>

                    <h2 class="text-3xl lg:text-4xl font-extrabold mb-4 leading-tight animate-fade-in-up">
                        Apply for a build slot
                    </h2>

                    <p class="text-white/90 text-lg mb-8 max-w-xl animate-fade-in-up">
                        Start with your details. We’ll respond within 24 business hours.
                        If it’s a quick question, WhatsApp is fine — applications get priority.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('contact') }}"
                           class="inline-flex items-center justify-center px-8 py-4 rounded-xl font-semibold text-white transition"
                           style="background-color: rgb(30 41 59);">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>

                            Apply for a Build Slot
                        </a>

                        <a href="https://wa.me/27844551871?text=Hi%20Blackpeach,%20I'd%20like%20to%20chat%20about%20a%20digital%20project."
                           class="inline-flex items-center justify-center px-8 py-4 rounded-xl font-semibold text-white transition bg-emerald-500 hover:bg-emerald-600">
                           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                            </svg>
                             WhatsApp Us
                        </a>
                    </div>
                </div>

                {{-- RIGHT: WHAT HAPPENS NEXT --}}
                <div class="rounded-2xl p-8 text-white animate-fade-in-up"
                     style="background-color: rgb(30 41 59);">

                    <h3 class="text-lg font-bold mb-6">
                        What happens next
                    </h3>

                    <ul class="space-y-4 text-white/90">
                        <li class="flex items-start gap-3">
                            <span class="mt-1 w-2.5 h-2.5 rounded-full bg-white"></span>
                            <span>You complete the contact form</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-1 w-2.5 h-2.5 rounded-full bg-white"></span>
                            <span>Capture a short project intake (5 minutes)</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-1 w-2.5 h-2.5 rounded-full bg-white"></span>
                            <span>You receive a confirmation email instantly</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-1 w-2.5 h-2.5 rounded-full bg-white"></span>
                            <span>We respond with next steps and a clear recommendation</span>
                        </li>
                    </ul>

                    <div class="mt-6 pt-6 border-t border-white/10 text-sm text-white/70">
                        🔒 Your info stays private. No spam. No data selling.
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


@endsection
