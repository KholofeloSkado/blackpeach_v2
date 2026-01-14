{{-- resources/views/pages/thankyou.blade.php --}}
@extends('layouts.public')

@section('title', 'Thank you — Blackpeach')

@section('content')
<main class="min-h-screen bp-grid-bg">
    <div class="mx-auto max-w-3xl px-6 py-12 lg:py-16">
        <div class="bg-white rounded-2xl border border-bp-gray-200 shadow-lg overflow-hidden">
            <div class="px-8 py-8 bg-gradient-to-br from-bp-black to-bp-gray-900">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-white/10 rounded-full mb-5">
                    <span class="w-1.5 h-1.5 bg-bp-red rounded-full pulse-dot"></span>
                    <span class="text-xs font-medium text-white/80 uppercase tracking-wider">Submitted</span>
                </div>

                <h1 class="text-2xl lg:text-3xl font-semibold text-white">
                    Thank you — we’ve received your intake.
                </h1>
                <p class="mt-2 text-sm text-bp-gray-300">
                    We’ll review and respond within 24 hours on business days.
                </p>
            </div>

            <div class="p-8 lg:p-10 space-y-6">
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="rounded-xl border border-bp-gray-200 bg-bp-gray-50 p-5">
                        <div class="text-sm font-semibold text-bp-black">Next step</div>
                        <div class="mt-1 text-sm text-bp-gray-600">
                            Keep an eye on your email/WhatsApp for our reply.
                        </div>
                    </div>

                    <div class="rounded-xl border border-bp-gray-200 bg-bp-gray-50 p-5">
                        <div class="text-sm font-semibold text-bp-black">What to prepare</div>
                        <div class="mt-1 text-sm text-bp-gray-600">
                            Any examples of websites you like, your logo, and your service list (if you have them).
                        </div>
                    </div>
                </div>

                <div class="pt-2">
                    <a href="{{ route('home') }}"
                       class="inline-flex items-center justify-center rounded-lg bg-bp-black hover:bg-bp-gray-900 text-white font-semibold px-5 py-3 transition">
                        Back to Home →
                    </a>
                </div>

                <p class="text-xs text-bp-gray-400 leading-relaxed">
                    Need to add details? Reply to the confirmation email or send a WhatsApp message with your name.
                </p>
            </div>
        </div>
    </div>
</main>
@endsection
