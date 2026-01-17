{{-- resources/views/pages/contact.blade.php --}}
@extends('layouts.public')

@section('title', 'Contact — Blackpeach')

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
        background: #B10000;
        animation: pulseRing 2.2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }

    .float-soft {
        animation: floatSoft 5s ease-in-out infinite;
    }
</style>
@endpush

@section('content')
<main class="relative min-h-screen bg-gradient-to-b from-white to-gray-50 overflow-hidden">
    {{-- Honeycomb background patterns --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-10 right-0 w-[420px] h-[420px] opacity-[0.04] float-soft">
            <svg viewBox="0 0 200 200" class="w-full h-full">
                <defs>
                    <pattern id="hexContact1" x="0" y="0" width="40" height="46" patternUnits="userSpaceOnUse">
                        <polygon points="20,0 40,11.5 40,34.5 20,46 0,34.5 0,11.5" fill="none" stroke="#B10000" stroke-width="1.5"/>
                    </pattern>
                </defs>
                <rect width="200" height="200" fill="url(#hexContact1)"/>
            </svg>
        </div>
        
        <div class="absolute bottom-20 left-0 w-[350px] h-[350px] opacity-[0.035]" style="animation: floatSoft 6s ease-in-out infinite;">
            <svg viewBox="0 0 200 200" class="w-full h-full">
                <defs>
                    <pattern id="hexContact2" x="0" y="0" width="40" height="46" patternUnits="userSpaceOnUse">
                        <polygon points="20,0 40,11.5 40,34.5 20,46 0,34.5 0,11.5" fill="none" stroke="#B10000" stroke-width="1.5"/>
                    </pattern>
                </defs>
                <rect width="200" height="200" fill="url(#hexContact2)"/>
            </svg>
        </div>

        {{-- Peach accent blob --}}
        <div class="absolute top-1/3 right-1/4 w-64 h-64 bg-gradient-to-br from-orange-100 to-red-50 rounded-full blur-3xl opacity-20"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-6 py-12 lg:py-20">
        {{-- Main Content Grid --}}
        <div class="grid lg:grid-cols-[45%_55%] gap-12 lg:gap-16 items-start">
            
            {{-- Left Column: Messaging --}}
            <section class="lg:sticky lg:top-12">
                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 rounded-full mb-6 shadow-sm animate-fade-in-up">
                    <span class="relative w-2 h-2 bg-bp-red rounded-full pulse-dot"></span>
                    <span class="text-sm font-medium text-gray-700">Contact</span>
                </div>

                {{-- Headline --}}
                <h1 class="text-4xl lg:text-5xl xl:text-6xl font-extrabold tracking-tight text-bp-black leading-[1.08] mb-6 animate-fade-in-up delay-100">
                    Systems. Clarity.<br>
                    <span class="text-bp-red">Growth.</span>
                </h1>

                {{-- Subheading --}}
                <p class="text-lg lg:text-xl text-gray-600 leading-relaxed max-w-lg mb-8 animate-fade-in-up delay-200">
                    Start with your contact details. We'll take it from there. No pressure, just clarity.
                </p>

                {{-- Info Cards --}}
                <div class="space-y-4 animate-fade-in-up delay-300">
                    <div class="flex items-start gap-4 p-5 bg-white rounded-xl border border-gray-200 hover:border-bp-red hover:shadow-lg transition-all duration-200">
                        <div class="w-12 h-12 bg-gradient-to-br from-bp-red to-red-600 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm font-bold text-bp-black">Response Time</div>
                            <div class="text-sm text-gray-600 mt-1">Within 24 hours on business days</div>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-5 bg-white rounded-xl border border-gray-200 hover:border-bp-red hover:shadow-lg transition-all duration-200">
                        <div class="w-12 h-12 bg-gradient-to-br from-bp-red to-red-600 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm font-bold text-bp-black">No Obligation</div>
                            <div class="text-sm text-gray-600 mt-1">Free consultation. Zero pressure.</div>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-5 bg-white rounded-xl border border-gray-200 hover:border-bp-red hover:shadow-lg transition-all duration-200">
                        <div class="w-12 h-12 bg-gradient-to-br from-bp-red to-red-600 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm font-bold text-bp-black">Direct Access</div>
                            <div class="text-sm text-gray-600 mt-1">Speak with decision-makers, not sales reps</div>
                        </div>
                    </div>
                </div>

                {{-- Trust Indicator --}}
                <div class="mt-12 pt-8 border-t border-gray-200 animate-fade-in-up delay-400">
                    <div class="flex items-center gap-3 text-sm text-gray-600">
                        <div class="w-10 h-10 bg-gray-50 border border-gray-200 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-bp-red" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <span>Your information is secure and never shared</span>
                    </div>
                </div>
            </section>

            {{-- Right Column: Contact Form --}}
            <section class="animate-fade-in-up delay-200">
                {{-- Form Container --}}
                <div class="rounded-2xl border-2 border-gray-200 shadow-2xl overflow-hidden bg-[#B10000] hover:bg-[#8a0000] text-white">
                    {{-- Form Header --}}
                    <div class="px-8 py-6 bg-gradient-to-r from-bp-red to-red-600 bg-[#1e293b]">
                        <h2 class="text-lg font-bold text-[#1e293b]">Start a Conversation</h2>
                        <p class="text-sm text-[#1e293b]/90 mt-1">Share your details. We'll take it from there</p>
                    </div>

                    {{-- Form Content --}}
                    <div class="p-8 lg:p-10">
                        {{-- Livewire Contact Form Component --}}
                        @livewire('public.lead-form')
                    </div>
                </div>

                {{-- Privacy Note --}}
                <div class="mt-6 text-center">
                    <p class="text-xs text-gray-500">
                        Protected by our
                        <a href="{{ route('privacy') }}" class="text-bp-red hover:text-bp-red-dark font-semibold hover:underline transition-colors">Privacy Policy</a>
                    </p>
                </div>
            </section>
        </div>
    </div>
</main>
@endsection