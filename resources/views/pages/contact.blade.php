{{-- resources/views/pages/contact.blade.php --}}
@extends('layouts.public')

@section('title', 'Contact — Blackpeach')

@push('styles')
<style>
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
        animation: fadeInUp 0.6s ease-out forwards;
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
</style>
@endpush

@section('content')
<main class="min-h-screen bp-grid-bg">
    <div class="max-w-7xl mx-auto px-6 py-8 lg:py-12">

        {{-- Main Content Grid --}}
        <div class="grid lg:grid-cols-[45%_55%] gap-12 lg:gap-16 items-start mt-16">
            
            {{-- Left Column: Animated Hero Messaging --}}
            <section class="lg:sticky lg:top-12">
                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-bp-gray-100 rounded-full mb-6 animate-fade-in-up">
                    <span class="w-1.5 h-1.5 bg-bp-red rounded-full pulse-dot"></span>
                    <span class="text-xs font-medium text-bp-gray-600 uppercase tracking-wider">Contact</span>
                </div>

                {{-- Main Headline --}}
                <h1 class="text-4xl lg:text-5xl xl:text-6xl font-bold tracking-tight text-bp-black leading-[1.1] animate-fade-in-up animate-delay-100">
                    Systems. Clarity.<br>
                    <span class="text-bp-red">Growth.</span>
                </h1>

                {{-- Subheading --}}
                <p class="mt-6 text-lg lg:text-xl text-bp-gray-600 leading-relaxed max-w-lg animate-fade-in-up animate-delay-200">
                    Start with your contact details. We'll take it from there. No pressure, just clarity.
                </p>

                {{-- Info Cards --}}
                <div class="mt-10 space-y-4">
                    {{-- Response Time Card --}}
                    <div class="flex items-start gap-4 p-5 bg-bp-gray-50 rounded-xl border border-bp-gray-100 hover:border-bp-gray-200 hover:shadow-sm transition-all duration-200 animate-fade-in-up animate-delay-300">
                        <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center border border-bp-gray-100 flex-shrink-0">
                            <svg class="w-5 h-5 text-bp-red" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm font-semibold text-bp-black">Response Time</div>
                            <div class="text-sm text-bp-gray-500 mt-0.5">Within 24 hours on business days</div>
                        </div>
                    </div>

                    {{-- No Obligation Card --}}
                    <div class="flex items-start gap-4 p-5 bg-bp-gray-50 rounded-xl border border-bp-gray-100 hover:border-bp-gray-200 hover:shadow-sm transition-all duration-200 animate-fade-in-up animate-delay-300">
                        <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center border border-bp-gray-100 flex-shrink-0">
                            <svg class="w-5 h-5 text-bp-red" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm font-semibold text-bp-black">No Obligation</div>
                            <div class="text-sm text-bp-gray-500 mt-0.5">Free consultation. Zero pressure.</div>
                        </div>
                    </div>

                    {{-- Direct Access Card --}}
                    <div class="flex items-start gap-4 p-5 bg-bp-gray-50 rounded-xl border border-bp-gray-100 hover:border-bp-gray-200 hover:shadow-sm transition-all duration-200 animate-fade-in-up animate-delay-400">
                        <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center border border-bp-gray-100 flex-shrink-0">
                            <svg class="w-5 h-5 text-bp-red" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm font-semibold text-bp-black">Direct Access</div>
                            <div class="text-sm text-bp-gray-500 mt-0.5">Speak with decision-makers, not sales reps</div>
                        </div>
                    </div>
                </div>

                {{-- Trust Indicator --}}
                <div class="mt-12 pt-8 border-t border-bp-gray-200 animate-fade-in-up animate-delay-400">
                    <div class="flex items-center gap-3 text-sm text-bp-gray-500">
                        <svg class="w-5 h-5 text-bp-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                        <span>Your information is secure and never shared</span>
                    </div>
                </div>
            </section>

            {{-- Right Column: Contact Form --}}
            <section class="animate-fade-in-up animate-delay-200">
                {{-- Form Container --}}
                <div class="bg-white rounded-2xl border border-bp-gray-200 shadow-lg overflow-hidden">
                    {{-- Form Header --}}
                    <div class="px-8 py-6 bg-gradient-to-br from-bp-black to-bp-gray-900">
                        <h2 class="text-lg font-semibold text-white">Start a Conversation</h2>
                        <p class="text-sm text-bp-gray-400 mt-1">Share your details. We'll take it from there</p>
                    </div>

                    {{-- Form Content --}}
                    <div class="p-8 lg:p-10">
                        {{-- Livewire Contact Form Component --}}
                        @livewire('public.lead-form')
                    </div>
                </div>

                {{-- Privacy Note --}}
                <div class="mt-6 text-center">
                    <p class="text-xs text-bp-gray-400">
                        Protected by our
                        <a href="{{ route('privacy') }}" class="text-bp-red hover:text-bp-red-dark hover:underline transition-colors">Privacy Policy</a>
                    </p>
                </div>
            </section>
        </div>

    </div>
</main>
@endsection