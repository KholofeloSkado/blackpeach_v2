{{-- resources/views/pages/approach.blade.php --}}
@extends('layouts.public')

@section('title', 'Our Approach — Blackpeach')
@section('meta_description', 'A clarity-first, systems-led approach: define the workflow, ship the tool, measure the outcome. Built for trust, conversion, and operational control.')

@push('styles')
<style>
  /* ============================================================
     APPROACH PAGE — premium, proof-driven, not a home clone
     Motifs: honeycomb + “mission control” systems diagrams
     ============================================================ */

  /* ---------- Motion + interactions (classy) ---------- */
  @media (prefers-reduced-motion: no-preference) {
    .reveal-up { opacity:0; transform: translateY(18px); transition: opacity .8s ease, transform .8s ease; }
    .reveal-up.is-visible { opacity:1; transform: translateY(0); }

    .reveal-right { opacity:0; transform: translateX(18px); transition: opacity .8s ease, transform .8s ease; }
    .reveal-right.is-visible { opacity:1; transform: translateX(0); }

    .reveal-scale { opacity:0; transform: translateY(10px) scale(.985); transition: opacity .8s ease, transform .8s ease; }
    .reveal-scale.is-visible { opacity:1; transform: translateY(0) scale(1); }

    .delay-100 { transition-delay: .10s; }
    .delay-200 { transition-delay: .20s; }
    .delay-300 { transition-delay: .30s; }
    .delay-400 { transition-delay: .40s; }
    .delay-500 { transition-delay: .50s; }

    .bp-btn { transition: transform .18s ease, box-shadow .18s ease, filter .18s ease; will-change: transform; }
    .bp-btn:hover { transform: translateY(-1px); box-shadow: 0 18px 35px rgba(0,0,0,.18); }
    .bp-btn:active { transform: translateY(0) scale(.98); }

    .bp-lift { transition: transform .22s ease, box-shadow .22s ease, border-color .22s ease; }
    .bp-lift:hover { transform: translateY(-3px); box-shadow: 0 24px 60px rgba(2,6,23,.14); border-color: rgba(177,0,0,.25); }

    /* gentle “mission control” glow */
    @keyframes glowPulse { 0%,100% { box-shadow: 0 0 0 rgba(0,0,0,0);} 50% { box-shadow: 0 28px 90px rgba(177,0,0,.20);} }
    .glow-soft { animation: glowPulse 6.5s ease-in-out infinite; }

    /* watermark drift */
    @keyframes drift { 0%,100% { transform: translate3d(0,0,0) rotate(0deg); opacity:.10;} 50% { transform: translate3d(-10px,8px,0) rotate(-1deg); opacity:.14;} }
    .honey-drift { animation: drift 8s ease-in-out infinite; }

    /* primary CTA sheen */
    .bp-sheen { position:relative; overflow:hidden; }
    .bp-sheen::after{
      content:""; position:absolute; top:-40%; left:-60%;
      width:60%; height:180%; transform: rotate(18deg);
      background: linear-gradient(90deg, transparent, rgba(255,255,255,.22), transparent);
      transition: left .85s ease;
    }
    .bp-sheen:hover::after { left:120%; }

    /* animated “signal line” in diagrams */
    @keyframes dashMove { to { stroke-dashoffset: -120; } }
    .dash-animate { stroke-dasharray: 8 10; stroke-dashoffset: 0; animation: dashMove 4.5s linear infinite; }
  }

  /* ---------- Base atoms ---------- */
  .bp-card { border:1px solid #e5e7eb; border-radius: 18px; background:#fff; }
  .bp-soft { background:#f9fafb; }

  /* ---------- “Proof tiles” style ---------- */
  .proof-tile {
    border-radius: 18px;
    border: 1px solid rgba(226,232,240,1);
    background: linear-gradient(180deg, #ffffff 0%, #fbfbfb 100%);
  }

  /* ---------- Dark “mission” panels ---------- */
  .mission-panel {
    border-radius: 22px;
    background: rgb(30 41 59);
    border: 1px solid rgba(255,255,255,.10);
    color: #fff;
  }

  /* ---------- Hex micro pattern (for headings) ---------- */
  .hex-rule {
    height: 1px;
    background: linear-gradient(90deg, rgba(177,0,0,.0), rgba(177,0,0,.35), rgba(177,0,0,.0));
  }
</style>
@endpush

@section('content')

{{-- ==========================================================
   HERO: “Mission control” vibe (unique to approach page)
   ========================================================== --}}
<section class="relative overflow-hidden bg-white pt-14 pb-16">
  {{-- aggressive honeycomb watermark + accent fields --}}
  <div class="absolute inset-0 pointer-events-none overflow-hidden">
    <div class="absolute -top-24 -right-24 w-[680px] opacity-[0.06] honey-drift">
      <svg viewBox="0 0 200 200" class="w-full h-full">
        <defs>
          <pattern id="ap_hex_bg_1" x="0" y="0" width="40" height="46" patternUnits="userSpaceOnUse">
            <polygon points="20,0 40,11.5 40,34.5 20,46 0,34.5 0,11.5" fill="none" stroke="#B10000" stroke-width="1.4"/>
          </pattern>
        </defs>
        <rect width="200" height="200" fill="url(#ap_hex_bg_1)"/>
      </svg>
    </div>

    <div class="absolute bottom-[-120px] left-[-120px] w-[720px] opacity-[0.045] honey-drift" style="animation-duration: 10s;">
      <svg viewBox="0 0 200 200" class="w-full h-full">
        <defs>
          <pattern id="ap_hex_bg_2" x="0" y="0" width="40" height="46" patternUnits="userSpaceOnUse">
            <polygon points="20,0 40,11.5 40,34.5 20,46 0,34.5 0,11.5" fill="none" stroke="#1e293b" stroke-width="1.1"/>
          </pattern>
        </defs>
        <rect width="200" height="200" fill="url(#ap_hex_bg_2)"/>
      </svg>
    </div>

    <div class="absolute top-1/3 left-1/3 w-80 h-80 bg-gradient-to-br from-orange-100 to-red-50 rounded-full blur-3xl opacity-25"></div>
    <div class="absolute top-10 left-10 w-56 h-56 bg-gradient-to-tr from-slate-100 to-transparent rounded-full blur-3xl opacity-60"></div>
  </div>

  <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
    <div class="grid lg:grid-cols-12 gap-10 items-center">

      {{-- LEFT: copy --}}
      <div class="lg:col-span-6">
        <div class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 rounded-full shadow-sm mb-6 reveal-up">
          <span class="w-2 h-2 bg-[#B10000] rounded-full" style="box-shadow: 0 0 0 6px rgba(177,0,0,.10);"></span>
          <span class="text-sm font-medium text-gray-700">Approach • Systems-led delivery</span>
        </div>

        <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight text-slate-900 leading-[1.06] mb-5 reveal-up delay-100">
          We build like mission control.
          <span class="block text-[#B10000]">Clear inputs. Controlled outputs.</span>
        </h1>

        <p class="text-lg md:text-xl text-gray-600 leading-relaxed max-w-2xl mb-8 reveal-up delay-200">
          Competitors sell “a website”. We deliver a working system:
          workflow + automation + reporting — designed to earn trust and improve conversion.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 reveal-up delay-300">
          <a href="{{ route('contact') }}"
             class="inline-flex items-center justify-center gap-2 rounded-lg bg-[#B10000] hover:bg-[#8a0000] text-white font-semibold px-8 py-4 text-base shadow-lg transition-all bp-btn bp-sheen">
            Apply for a Build Slot
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
          </a>

          <a href="{{ route('systems') }}"
             class="inline-flex items-center justify-center gap-2 rounded-lg bg-white hover:bg-gray-50 text-slate-900 font-semibold px-8 py-4 text-base border-2 border-gray-200 hover:border-gray-300 transition-all bp-btn">
            See What We Build
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
            </svg>
          </a>
        </div>

        {{-- trust micro-proof row --}}
        <div class="mt-10 grid sm:grid-cols-3 gap-4 reveal-up delay-400">
          <div class="proof-tile p-4 bp-lift">
            <div class="text-xs text-gray-500 mb-1">Method</div>
            <div class="text-sm font-semibold text-slate-900">Workflow-first design</div>
          </div>
          <div class="proof-tile p-4 bp-lift">
            <div class="text-xs text-gray-500 mb-1">Proof</div>
            <div class="text-sm font-semibold text-slate-900">Reporting included</div>
          </div>
          <div class="proof-tile p-4 bp-lift">
            <div class="text-xs text-gray-500 mb-1">Control</div>
            <div class="text-sm font-semibold text-slate-900">Ownership + docs</div>
          </div>
        </div>
      </div>

      {{-- RIGHT: “Mission Control” visual (inline SVG proof diagram) --}}
      <div class="lg:col-span-6 reveal-right delay-200">
        <div class="bp-card overflow-hidden shadow-2xl border-2 border-gray-200">
          <div class="px-5 py-4 border-b border-gray-200 bg-white flex items-center justify-between">
            <div class="flex items-center gap-3">
              <div class="w-10 h-10 rounded-xl bg-[#B10000]/10 flex items-center justify-center">
                <span class="w-2.5 h-2.5 bg-[#B10000] rounded-full"></span>
              </div>
              <div>
                <div class="text-sm font-bold text-slate-900">Systems Blueprint</div>
                <div class="text-xs text-gray-500">Input → Workflow → Output → Reporting</div>
              </div>
            </div>
            <div class="text-xs font-semibold text-gray-500">v1</div>
          </div>

          <div class="bg-gray-50 p-6">
            <div class="bg-white rounded-2xl border border-gray-200 p-5">
              {{-- Diagram --}}
              <svg viewBox="0 0 900 320" class="w-full h-auto">
                <defs>
                  <linearGradient id="ap_red_grad" x1="0" y1="0" x2="1" y2="1">
                    <stop offset="0" stop-color="#B10000"/>
                    <stop offset="1" stop-color="#ff4d4d"/>
                  </linearGradient>
                  <filter id="ap_soft_shadow" x="-20%" y="-20%" width="140%" height="140%">
                    <feDropShadow dx="0" dy="10" stdDeviation="12" flood-color="#0b1220" flood-opacity="0.10"/>
                  </filter>
                </defs>

                {{-- nodes --}}
                <g filter="url(#ap_soft_shadow)">
                  {{-- Input --}}
                  <rect x="40" y="70" rx="18" ry="18" width="210" height="180" fill="#ffffff" stroke="#e5e7eb" stroke-width="2"/>
                  <text x="70" y="115" font-size="16" font-weight="700" fill="#0f172a">Inputs</text>
                  <text x="70" y="145" font-size="13" fill="#64748b">Contact forms</text>
                  <text x="70" y="168" font-size="13" fill="#64748b">Bookings</text>
                  <text x="70" y="191" font-size="13" fill="#64748b">Payments</text>
                  <text x="70" y="214" font-size="13" fill="#64748b">Admin actions</text>
                  <circle cx="210" cy="106" r="8" fill="url(#ap_red_grad)"/>

                  {{-- Workflow --}}
                  <rect x="345" y="40" rx="22" ry="22" width="260" height="240" fill="#ffffff" stroke="#e5e7eb" stroke-width="2"/>
                  <text x="375" y="85" font-size="16" font-weight="800" fill="#0f172a">Workflow engine</text>
                  <text x="375" y="115" font-size="13" fill="#64748b">Statuses • routing • follow-up</text>
                  <text x="375" y="140" font-size="13" fill="#64748b">Ownership • audit trail • roles</text>

                  {{-- honeycomb cell cluster --}}
                  <g opacity="0.95" transform="translate(390,165)">
                    <polygon points="25,0 50,14 50,42 25,56 0,42 0,14" fill="#fff" stroke="#B10000" stroke-width="2"/>
                    <polygon points="85,0 110,14 110,42 85,56 60,42 60,14" fill="#fff" stroke="#B10000" stroke-width="2"/>
                    <polygon points="55,52 80,66 80,94 55,108 30,94 30,66" fill="#fff" stroke="#B10000" stroke-width="2"/>
                    <circle cx="25" cy="28" r="4" fill="#B10000"/>
                    <circle cx="85" cy="28" r="4" fill="#B10000"/>
                    <circle cx="55" cy="80" r="4" fill="#B10000"/>
                  </g>

                  {{-- Output --}}
                  <rect x="700" y="70" rx="18" ry="18" width="160" height="180" fill="#ffffff" stroke="#e5e7eb" stroke-width="2"/>
                  <text x="725" y="115" font-size="16" font-weight="700" fill="#0f172a">Outputs</text>
                  <text x="725" y="145" font-size="13" fill="#64748b">Portal</text>
                  <text x="725" y="168" font-size="13" fill="#64748b">Dashboards</text>
                  <text x="725" y="191" font-size="13" fill="#64748b">Reports</text>
                  <text x="725" y="214" font-size="13" fill="#64748b">Automations</text>
                  <circle cx="840" cy="106" r="8" fill="#0ea5e9" opacity="0.9"/>
                </g>

                {{-- connecting lines --}}
                <path d="M250 160 C 300 160, 305 160, 345 160" fill="none" stroke="#B10000" stroke-width="4" class="dash-animate"/>
                <path d="M605 160 C 650 160, 660 160, 700 160" fill="none" stroke="#0ea5e9" stroke-width="4" class="dash-animate"/>

                {{-- reporting loop --}}
                <path d="M780 250 C 650 320, 420 320, 250 250" fill="none" stroke="#94a3b8" stroke-width="3" opacity="0.75" class="dash-animate"/>
                <text x="410" y="304" font-size="12" fill="#64748b">Reporting loop: measure → improve → convert</text>
              </svg>

              <div class="mt-4 flex flex-wrap gap-2">
                <span class="text-xs font-semibold px-3 py-1 rounded-full bg-[#B10000]/10 text-[#B10000]">Scope control</span>
                <span class="text-xs font-semibold px-3 py-1 rounded-full bg-slate-100 text-slate-700">Operational discipline</span>
                <span class="text-xs font-semibold px-3 py-1 rounded-full bg-emerald-50 text-emerald-700">Conversion follow-up</span>
                <span class="text-xs font-semibold px-3 py-1 rounded-full bg-sky-50 text-sky-700">Dashboards</span>
              </div>
            </div>

            <div class="mt-4 text-xs text-gray-500">
              This diagram is the point: we don’t “design pages”, we engineer workflows.
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

{{-- ==========================================================
   WHY THIS APPROACH WINS (competitor contrast, visual proof)
   ========================================================== --}}
<section class="py-20 bg-gradient-to-b from-gray-50 to-white">
  <div class="max-w-7xl mx-auto px-6 lg:px-8">

    <div class="max-w-3xl mb-10 reveal-up">
      <div class="inline-block px-4 py-2 bg-red-50 text-[#B10000] rounded-full text-sm font-semibold mb-4">
        Leverage
      </div>
      <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 mb-4">
        Why our approach is <span class="underline decoration-slate-900 text-[#B10000]">For you</span>:
      </h2>
      <p class="text-lg text-gray-600">
        Trust is built when your operations feel controlled. People can tell when you’re running a real system.
      </p>
    </div>

    <div class="grid lg:grid-cols-12 gap-6 items-stretch">
      {{-- competitor: pretty pages --}}
      <div class="lg:col-span-5 proof-tile p-8 bp-lift reveal-up delay-100">
        <div class="flex items-center justify-between mb-5">
          <div class="text-sm font-extrabold text-slate-900">Typical agency output</div>
          <span class="text-xs font-semibold px-3 py-1 rounded-full bg-gray-100 text-gray-600">looks nice</span>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white p-5">
          <svg viewBox="0 0 520 220" class="w-full h-auto">
            <rect x="14" y="14" width="492" height="192" rx="18" fill="#f8fafc" stroke="#e2e8f0"/>
            <rect x="40" y="42" width="220" height="18" rx="9" fill="#cbd5e1"/>
            <rect x="40" y="76" width="420" height="10" rx="5" fill="#e2e8f0"/>
            <rect x="40" y="98" width="360" height="10" rx="5" fill="#e2e8f0"/>
            <rect x="40" y="120" width="390" height="10" rx="5" fill="#e2e8f0"/>
            <rect x="40" y="154" width="140" height="32" rx="16" fill="#cbd5e1"/>
            <text x="60" y="174" font-size="12" fill="#64748b" font-weight="700">Contact us</text>
            <circle cx="470" cy="54" r="8" fill="#94a3b8"/>
          </svg>

          <div class="mt-4 text-sm text-gray-600">
            Usually: a landing page + a form. Then… someone manually follows up.
          </div>
        </div>

        <div class="mt-6 hex-rule"></div>

        <ul class="mt-6 space-y-3 text-sm text-gray-700">
          <li class="flex items-start gap-2"><span class="text-gray-400 font-bold">•</span> No workflow, no statuses, no routing</li>
          <li class="flex items-start gap-2"><span class="text-gray-400 font-bold">•</span> Manual follow-up → missed leads</li>
          <li class="flex items-start gap-2"><span class="text-gray-400 font-bold">•</span> No reporting → guesswork</li>
        </ul>
      </div>

      {{-- you: system + reporting --}}
      <div class="lg:col-span-7 mission-panel p-8 glow-soft reveal-up delay-200">
        <div class="flex items-center justify-between mb-5">
          <div class="text-sm font-extrabold">Blackpeach output</div>
          <span class="text-xs font-semibold px-3 py-1 rounded-full bg-white/10 text-white">works + converts</span>
        </div>

        <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
          <svg viewBox="0 0 760 240" class="w-full h-auto">
            <defs>
              <linearGradient id="ap_dark_red" x1="0" y1="0" x2="1" y2="1">
                <stop offset="0" stop-color="#B10000"/>
                <stop offset="1" stop-color="#ff4d4d"/>
              </linearGradient>
            </defs>

            {{-- pipeline --}}
            <rect x="18" y="18" width="724" height="204" rx="18" fill="rgba(255,255,255,.04)" stroke="rgba(255,255,255,.10)"/>
            <text x="42" y="56" font-size="14" fill="#ffffff" font-weight="800">Lead pipeline + reporting</text>
            <text x="42" y="78" font-size="12" fill="rgba(255,255,255,.72)">Statuses • automations • dashboards</text>

            {{-- columns --}}
            @php
              $cols = [
                ['Captured', 70],
                ['Qualified', 62],
                ['Booked', 48],
                ['Delivered', 55],
              ];
            @endphp

            <g transform="translate(42,98)">
              @foreach($cols as $i => [$label, $h])
                <g transform="translate({{ $i * 170 }},0)">
                  <rect x="0" y="0" width="150" height="110" rx="14" fill="rgba(255,255,255,.06)" stroke="rgba(255,255,255,.10)"/>
                  <text x="14" y="28" font-size="12" fill="rgba(255,255,255,.75)" font-weight="700">{{ $label }}</text>
                  <rect x="14" y="44" width="122" height="8" rx="4" fill="rgba(255,255,255,.10)"/>
                  <rect x="14" y="62" width="122" height="8" rx="4" fill="rgba(255,255,255,.10)"/>
                  <rect x="14" y="80" width="122" height="8" rx="4" fill="rgba(255,255,255,.10)"/>

                  {{-- metric bar --}}
                  <rect x="14" y="98" width="{{ $h }}" height="10" rx="5" fill="url(#ap_dark_red)"/>
                </g>
              @endforeach
            </g>

            {{-- connectors --}}
            <path d="M190 156 C 220 156, 240 156, 260 156" fill="none" stroke="rgba(255,255,255,.55)" stroke-width="3" class="dash-animate"/>
            <path d="M360 156 C 390 156, 410 156, 430 156" fill="none" stroke="rgba(255,255,255,.55)" stroke-width="3" class="dash-animate"/>
            <path d="M530 156 C 560 156, 580 156, 600 156" fill="none" stroke="rgba(255,255,255,.55)" stroke-width="3" class="dash-animate"/>

            {{-- reporting badge --}}
            <g transform="translate(600,40)">
              <rect x="0" y="0" width="132" height="32" rx="16" fill="rgba(177,0,0,.22)" stroke="rgba(255,255,255,.10)"/>
              <circle cx="18" cy="16" r="6" fill="#ff4d4d"/>
              <text x="34" y="21" font-size="12" fill="#ffffff" font-weight="800">Reporting on</text>
            </g>
          </svg>

          <div class="mt-4 text-sm text-white/85">
            Result: faster response, fewer dropped leads, cleaner delivery, measurable outcomes.
          </div>
        </div>

        <div class="mt-6 grid sm:grid-cols-3 gap-4">
          <div class="rounded-2xl border border-white/10 bg-white/5 p-4 bp-lift">
            <div class="text-xs text-white/70 mb-1">Speed</div>
            <div class="text-sm font-semibold">Automated follow-up</div>
          </div>
          <div class="rounded-2xl border border-white/10 bg-white/5 p-4 bp-lift">
            <div class="text-xs text-white/70 mb-1">Control</div>
            <div class="text-sm font-semibold">Statuses + routing</div>
          </div>
          <div class="rounded-2xl border border-white/10 bg-white/5 p-4 bp-lift">
            <div class="text-xs text-white/70 mb-1">Proof</div>
            <div class="text-sm font-semibold">Dashboards + reports</div>
          </div>
        </div>

        <div class="mt-7">
          <a href="{{ route('contact') }}"
             class="inline-flex items-center justify-center gap-2 rounded-lg bg-white text-slate-900 font-semibold px-7 py-3.5 bp-btn">
            Apply for a Build Slot →
          </a>
        </div>
      </div>
    </div>

  </div>
</section>

{{-- ==========================================================
   THE FOUR PHASES (visual “flight plan” + proof)
   ========================================================== --}}
<section class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-6 lg:px-8">

    <div class="text-center max-w-3xl mx-auto mb-12 reveal-up">
      <div class="inline-block px-4 py-2 bg-red-50 text-[#B10000] rounded-full text-sm font-semibold mb-4">
        Flight plan
      </div>
      <h2 class="text-3xl lg:text-5xl font-bold text-slate-900 mb-5">A <span class="underline decoration-slate-900 text-[#B10000]">Build Process</span> that protects quality</h2>
      <p class="text-xl text-gray-600">Each phase exists to prevent expensive mistakes and improve conversion.</p>
    </div>

    <div class="grid lg:grid-cols-12 gap-6 items-stretch">
      {{-- left: timeline --}}
      <div class="lg:col-span-7 bp-card p-8 border-2 border-gray-200 shadow-xl reveal-up delay-100 relative overflow-hidden">
        <div class="absolute -top-16 -right-16 w-[320px] opacity-[0.05] pointer-events-none">
          <svg viewBox="0 0 200 200" class="w-full h-full">
            <defs>
              <pattern id="ap_hex_tl" x="0" y="0" width="40" height="46" patternUnits="userSpaceOnUse">
                <polygon points="20,0 40,11.5 40,34.5 20,46 0,34.5 0,11.5" fill="none" stroke="#B10000" stroke-width="1.4"/>
              </pattern>
            </defs>
            <rect width="200" height="200" fill="url(#ap_hex_tl)"/>
          </svg>
        </div>

        @php
          $phases = [
            ['01', 'Apply + qualify', 'We confirm fit, seriousness, and what “success” looks like.', 'Stops wasted budget.'],
            ['02', 'System design', 'We map workflow, roles, statuses, data, and automation triggers.', 'Stops broken processes.'],
            ['03', 'Build + reporting', 'We implement the system and dashboards with clean milestones.', 'Stops guesswork.'],
            ['04', 'Handover + support', 'Documentation, training, and support options.', 'Stops dependency.'],
          ];
        @endphp

        <div class="space-y-5">
          @foreach($phases as $i => [$n, $t, $d, $why])
            <div class="flex gap-4 items-start bp-lift rounded-2xl border border-gray-200 bg-gray-50 p-5">
              <div class="w-12 h-12 rounded-xl flex items-center justify-center text-white font-extrabold"
                   style="background: linear-gradient(135deg, #B10000, #ff4d4d);">
                {{ $n }}
              </div>
              <div class="flex-1">
                <div class="flex items-center justify-between gap-3">
                  <h3 class="text-lg font-bold text-slate-900">{{ $t }}</h3>
                  <span class="text-xs font-semibold px-3 py-1 rounded-full bg-white border border-gray-200 text-gray-600">
                    {{ $why }}
                  </span>
                </div>
                <p class="mt-1 text-sm text-gray-600">{{ $d }}</p>
              </div>
            </div>
          @endforeach
        </div>

        <div class="mt-7 flex flex-col sm:flex-row gap-3">
          <a href="{{ route('contact') }}"
             class="inline-flex items-center justify-center gap-2 rounded-lg bg-[#B10000] hover:bg-[#8a0000] text-white font-semibold px-6 py-3 bp-btn bp-sheen">
            Apply for a Build Slot
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
          </a>
          <a href="{{ route('how-it-works') }}"
             class="inline-flex items-center justify-center gap-2 rounded-lg bg-white hover:bg-gray-50 text-slate-900 font-semibold px-6 py-3 border-2 border-gray-200 hover:border-gray-300 bp-btn">
            See Full Process
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
            </svg>
          </a>
        </div>
      </div>

      {{-- right: “what we measure” dashboard proof --}}
      <div class="lg:col-span-5 reveal-right delay-200">
        <div class="bp-card border-2 border-gray-200 shadow-xl overflow-hidden">
          <div class="px-5 py-4 bg-white border-b border-gray-200 flex items-center justify-between">
            <div class="text-sm font-extrabold text-slate-900">What we measure (proof)</div>
            <span class="text-xs font-semibold px-3 py-1 rounded-full bg-emerald-50 text-emerald-700">reporting included</span>
          </div>
          <div class="p-6 bg-gray-50">
            <div class="grid grid-cols-2 gap-4">
              <div class="bg-white rounded-2xl border border-gray-200 p-4 bp-lift">
                <div class="text-xs text-gray-500 mb-1">Response time</div>
                <div class="text-2xl font-extrabold text-slate-900">↘</div>
                <div class="text-xs text-emerald-700 mt-1">automation + routing</div>
              </div>
              <div class="bg-white rounded-2xl border border-gray-200 p-4 bp-lift">
                <div class="text-xs text-gray-500 mb-1">Lead follow-up</div>
                <div class="text-2xl font-extrabold text-slate-900">↑</div>
                <div class="text-xs text-emerald-700 mt-1">no dropped leads</div>
              </div>
              <div class="bg-white rounded-2xl border border-gray-200 p-4 bp-lift">
                <div class="text-xs text-gray-500 mb-1">Conversion rate</div>
                <div class="text-2xl font-extrabold text-slate-900">↑</div>
                <div class="text-xs text-emerald-700 mt-1">clear pipeline</div>
              </div>
              <div class="bg-white rounded-2xl border border-gray-200 p-4 bp-lift">
                <div class="text-xs text-gray-500 mb-1">Manual work</div>
                <div class="text-2xl font-extrabold text-slate-900">↘</div>
                <div class="text-xs text-emerald-700 mt-1">repeat tasks removed</div>
              </div>
            </div>

            <div class="mt-5 bg-white rounded-2xl border border-gray-200 p-5">
              <div class="flex items-center justify-between mb-3">
                <div class="text-xs text-gray-500">Weekly pipeline</div>
                <div class="text-xs text-gray-400">example</div>
              </div>
              <div class="flex items-end gap-2 h-24">
                <div class="flex-1 rounded-t bg-gradient-to-t from-[#B10000] to-red-400" style="height: 60%;"></div>
                <div class="flex-1 rounded-t bg-gradient-to-t from-[#B10000] to-red-400" style="height: 72%;"></div>
                <div class="flex-1 rounded-t bg-gradient-to-t from-[#B10000] to-red-400" style="height: 84%;"></div>
                <div class="flex-1 rounded-t bg-gradient-to-t from-[#B10000] to-red-400" style="height: 100%;"></div>
                <div class="flex-1 rounded-t bg-gradient-to-t from-[#B10000] to-red-400" style="height: 78%;"></div>
              </div>
              <div class="mt-3 text-xs text-gray-500">You don’t manage what you can’t see.</div>
            </div>

            <div class="mt-5">
              <a href="{{ route('contact') }}"
                 class="inline-flex items-center justify-center w-full gap-2 rounded-lg bg-[#B10000] hover:bg-[#8a0000] text-white font-semibold px-6 py-3 bp-btn bp-sheen">
                Apply for a Build Slot →
              </a>
              <div class="mt-2 text-xs text-gray-500 text-center">We respond within 24 business hours.</div>
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>
</section>

{{-- ==========================================================
   FINAL CTA (strong, premium, unmistakable)
   ========================================================== --}}
<section class="py-24">
  <div class="max-w-7xl mx-auto px-6 lg:px-8">
    <div class="rounded-3xl p-10 lg:p-14 relative overflow-hidden glow-soft reveal-scale"
         style="background-color: rgb(177 0 0);">

      {{-- honeycomb watermark (white) --}}
      <div class="absolute -top-24 -right-16 w-[420px] opacity-[0.12] pointer-events-none honey-drift hidden md:block">
        <svg viewBox="0 0 200 200" class="w-full h-full">
          <defs>
            <pattern id="ap_hex_cta" x="0" y="0" width="40" height="46" patternUnits="userSpaceOnUse">
              <polygon points="20,0 40,11.5 40,34.5 20,46 0,34.5 0,11.5" fill="none" stroke="#ffffff" stroke-width="1.4"/>
            </pattern>
          </defs>
          <rect width="200" height="200" fill="url(#ap_hex_cta)"/>
        </svg>
      </div>

      <div class="grid lg:grid-cols-2 gap-10 items-center relative">
        {{-- LEFT --}}
        <div class="text-white">
          <div class="inline-block mb-4 px-4 py-2 rounded-full text-sm font-semibold reveal-up"
               style="background-color: rgb(30 41 59);">
            Build slots are limited
          </div>

          <h2 class="text-3xl lg:text-4xl font-extrabold mb-4 leading-tight reveal-up delay-100">
            If you want trust, systems win.
          </h2>

          <p class="text-white/90 text-lg mb-8 max-w-xl reveal-up delay-200">
            Apply if you’re ready for a professional workflow, clean automation, and reporting that proves what’s working.
          </p>

          <div class="flex flex-col sm:flex-row gap-4 reveal-up delay-300">
            <a href="{{ route('contact') }}"
               class="inline-flex items-center justify-center px-8 py-4 rounded-xl font-semibold text-white bp-btn bp-sheen"
               style="background-color: rgb(30 41 59);">
              Apply for a Build Slot
              <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
              </svg>
            </a>

            <a href="{{ route('systems') }}"
               class="inline-flex items-center justify-center px-8 py-4 rounded-xl font-semibold bg-white text-slate-800 hover:bg-gray-100 bp-btn">
              Browse Systems →
            </a>
          </div>
        </div>

        {{-- RIGHT --}}
        <div class="rounded-2xl p-8 text-white reveal-up delay-200"
             style="background-color: rgb(30 41 59);">
          <h3 class="text-lg font-bold mb-6">What you’ll receive (fast)</h3>

          <ul class="space-y-4 text-white/90">
            <li class="flex items-start gap-3">
              <span class="mt-1 w-2.5 h-2.5 rounded-full bg-white"></span>
              <span>A clear recommendation (what to build first)</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="mt-1 w-2.5 h-2.5 rounded-full bg-white"></span>
              <span>A scope direction (workflow + features)</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="mt-1 w-2.5 h-2.5 rounded-full bg-white"></span>
              <span>Reporting plan (what we’ll measure)</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="mt-1 w-2.5 h-2.5 rounded-full bg-white"></span>
              <span>Next steps within 24 business hours</span>
            </li>
          </ul>

          <div class="mt-6 pt-6 border-t border-white/10 text-sm text-white/70">
            🔒 Private. No spam. No data selling.
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

@endsection

@push('scripts')
<script>
  // Reveal animations (IntersectionObserver)
  (() => {
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    const els = document.querySelectorAll('.reveal-up, .reveal-right, .reveal-scale');
    if (!('IntersectionObserver' in window)) {
      els.forEach(el => el.classList.add('is-visible'));
      return;
    }

    const io = new IntersectionObserver((entries) => {
      entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('is-visible'); });
    }, { threshold: 0.15 });

    els.forEach(el => io.observe(el));
  })();
</script>
@endpush
