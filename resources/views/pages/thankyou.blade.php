{{-- resources/views/pages/thankyou.blade.php --}}
@extends('layouts.public')

@section('title', 'Thank You — Blackpeach')

@push('styles')
<style>
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes floatSoft {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }
    
    @keyframes pulseRing {
        0% { transform: scale(1); opacity: 1; }
        100% { transform: scale(1.35); opacity: 0; }
    }
    
    @keyframes checkmark {
        0% { stroke-dashoffset: 100; }
        100% { stroke-dashoffset: 0; }
    }

    .animate-fade-in-up {
        animation: fadeInUp 0.8s ease-out forwards;
    }

    .delay-100 { animation-delay: 0.1s; opacity: 0; }
    .delay-200 { animation-delay: 0.2s; opacity: 0; }
    .delay-300 { animation-delay: 0.3s; opacity: 0; }
    .delay-400 { animation-delay: 0.4s; opacity: 0; }

    .pulse-dot { position: relative; }
    .pulse-dot::before {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 50%;
        background: #1e293b;
        animation: pulseRing 2.2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }

    .float-soft {
        animation: floatSoft 5s ease-in-out infinite;
    }

    .checkmark-path {
        stroke-dasharray: 100;
        stroke-dashoffset: 100;
        animation: checkmark 0.6s ease-out 0.3s forwards;
    }
</style>
@endpush

@section('content')
<main class="relative min-h-screen bg-gradient-to-b from-white to-gray-50 overflow-hidden flex items-center">
    {{-- Honeycomb background patterns --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-10 right-0 w-[420px] h-[420px] opacity-[0.04] float-soft">
            <svg viewBox="0 0 200 200" class="w-full h-full">
                <defs>
                    <pattern id="hexThanks1" x="0" y="0" width="40" height="46" patternUnits="userSpaceOnUse">
                        <polygon points="20,0 40,11.5 40,34.5 20,46 0,34.5 0,11.5" fill="none" stroke="#1e293b" stroke-width="1.5"/>
                    </pattern>
                </defs>
                <rect width="200" height="200" fill="url(#hexThanks1)"/>
            </svg>
        </div>
        
        <div class="absolute bottom-20 left-0 w-[350px] h-[350px] opacity-[0.035]" style="animation: floatSoft 6s ease-in-out infinite;">
            <svg viewBox="0 0 200 200" class="w-full h-full">
                <defs>
                    <pattern id="hexThanks2" x="0" y="0" width="40" height="46" patternUnits="userSpaceOnUse">
                        <polygon points="20,0 40,11.5 40,34.5 20,46 0,34.5 0,11.5" fill="none" stroke="#1e293b" stroke-width="1.5"/>
                    </pattern>
                </defs>
                <rect width="200" height="200" fill="url(#hexThanks2)"/>
            </svg>
        </div>

        {{-- Green accent blob --}}
        <div class="absolute top-1/3 right-1/4 w-64 h-64 bg-gradient-to-br from-emerald-100 to-slate-50 rounded-full blur-3xl opacity-30"></div>
    </div>

    <div class="relative w-full max-w-4xl mx-auto px-6 py-12">
        {{-- Success Icon --}}
        <div class="text-center mb-8 animate-fade-in-up">
            <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-br from-slate-500 to-slate-600 rounded-full shadow-2xl mb-6">
                <svg class="w-14 h-14 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path class="checkmark-path" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-slate-200 rounded-full shadow-sm">
                <span class="relative w-2 h-2 bg-slate-500 rounded-full pulse-dot"></span>
                <span class="text-sm font-semibold text-green-700">Submission Received</span>
            </div>
        </div>

        {{-- Main Card --}}
        <div class="bg-white rounded-3xl border-2 border-gray-200 shadow-2xl overflow-hidden animate-fade-in-up delay-100">
            {{-- Header --}}
            <div class="px-8 py-8 lg:px-12 lg:py-10 bg-gradient-to-r from-red-500 to-red-600 text-center">
                <h1 class="text-3xl lg:text-4xl font-extrabold text-white mb-3">
                    Thank you — we've received your intake
                </h1>
                <p class="text-lg text-white/90">
                    We'll review and respond within 24 hours on business days.
                </p>
            </div>

            {{-- Content --}}
            <div class="p-8 lg:p-12">
                {{-- Next Steps Grid --}}
                <div class="grid md:grid-cols-2 gap-6 mb-8">
                    <div class="p-6 rounded-xl bg-gradient-to-br from-green-50 to-emerald-50 border-2 border-green-200">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center flex-shrink-0 shadow-sm">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="text-sm font-bold text-bp-black mb-1">Next Step</div>
                                <div class="text-sm text-gray-600">
                                    Keep an eye on your email/WhatsApp for our reply
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 rounded-xl bg-gradient-to-br from-blue-50 to-indigo-50 border-2 border-blue-200">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center flex-shrink-0 shadow-sm">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="text-sm font-bold text-bp-black mb-1">What to Prepare</div>
                                <div class="text-sm text-gray-600">
                                    Examples of sites you like, your logo, and service list (if available)
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- What Happens Next --}}
                <div class="bg-gray-50 rounded-2xl border-2 border-gray-200 p-6 lg:p-8 mb-8">
                    <h3 class="text-lg font-bold text-bp-black mb-4 flex items-center gap-2">
                        <span class="w-8 h-8 bg-bp-red rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </span>
                        What happens next?
                    </h3>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3 text-gray-700">
                            <span class="mt-1 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-xs font-bold text-green-600">1</span>
                            </span>
                            <span>We review your intake and assess project fit</span>
                        </li>
                        <li class="flex items-start gap-3 text-gray-700">
                            <span class="mt-1 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-xs font-bold text-green-600">2</span>
                            </span>
                            <span>You'll receive our honest feedback and recommended scope</span>
                        </li>
                        <li class="flex items-start gap-3 text-gray-700">
                            <span class="mt-1 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-xs font-bold text-green-600">3</span>
                            </span>
                            <span>If we're a fit, we'll schedule a quick alignment call</span>
                        </li>
                    </ul>
                </div>

                {{-- CTA Buttons --}}
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('home') }}"
                       class="bg-[#B10000] hover:bg-[#8a0000] text-white inline-flex items-center justify-center gap-2 rounded-xl bg-bp-black hover:bg-bp-gray-900 text-white font-semibold px-8 py-4 transition-all shadow-lg hover:shadow-xl">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Back to Home
                    </a>

                    <a href="https://wa.me/27844551871?text=Hi%20Blackpeach,%20I%20just%20submitted%20my%20intake%20and%20wanted%20to%20add..."
                       class="inline-flex items-center justify-center gap-2 rounded-xl bg-white hover:bg-gray-50 text-bp-black font-semibold px-8 py-4 border-2 border-gray-200 hover:border-gray-300 transition-all">
                        <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L0 24l6.304-1.654a11.882 11.882 0 005.713 1.456h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        Need to Add Details?
                    </a>
                </div>

                {{-- Help Text --}}
                <p class="mt-6 text-center text-xs text-gray-500 leading-relaxed">
                    Questions? Reply to the confirmation email or send us a WhatsApp with your name.
                </p>
            </div>
        </div>
    </div>
</main>
@endsection