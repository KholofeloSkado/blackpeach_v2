{{-- resources/views/pages/home.blade.php --}}
@extends('layouts.public')

@section('title', 'Blackpeach — Systems. Clarity. Growth.')

@section('content')
<main class="bp-grid-bg">
    <div class="max-w-7xl mx-auto px-6 py-10 lg:py-16">

        {{-- HERO --}}
        <section class="grid lg:grid-cols-[55%_45%] gap-10 lg:gap-16 items-start">
            <div class="animate-fade-in-up">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-bp-gray-100 rounded-full mb-6">
                    <span class="w-1.5 h-1.5 bg-bp-red rounded-full pulse-dot"></span>
                    <span class="text-xs font-medium text-bp-gray-600 uppercase tracking-wider">Blackpeach Consulting</span>
                </div>

                <h1 class="text-4xl lg:text-5xl xl:text-6xl font-bold tracking-tight text-bp-black leading-[1.05]">
                    Websites that support your
                    <span class="text-bp-red">business systems</span> —
                    not just your brand.
                </h1>

                <p class="mt-6 text-lg lg:text-xl text-bp-gray-600 leading-relaxed max-w-xl">
                    We design and build websites for service businesses that need clarity, structure, and measurable outcomes —
                    without noise, fluff, or guesswork.
                </p>

                <div class="mt-8 flex flex-col sm:flex-row gap-3">
                    <a href="{{ route('contact') }}"
                       class="inline-flex items-center justify-center rounded-lg bg-bp-black hover:bg-bp-gray-900 text-white font-semibold px-6 py-3 transition">
                        Start a conversation →
                    </a>

                    <a href="{{ route('how-it-works') }}"
                       class="inline-flex items-center justify-center rounded-lg border border-bp-gray-200 hover:border-bp-gray-300 text-bp-black font-semibold px-6 py-3 transition bg-white">
                        How it works
                    </a>
                </div>

                <div class="mt-10 grid sm:grid-cols-3 gap-4">
                    <div class="p-5 rounded-xl border border-bp-gray-200 bg-white">
                        <div class="text-sm font-semibold text-bp-black">Clarity first</div>
                        <div class="mt-1 text-sm text-bp-gray-500">We define scope before design.</div>
                    </div>
                    <div class="p-5 rounded-xl border border-bp-gray-200 bg-white">
                        <div class="text-sm font-semibold text-bp-black">Selective</div>
                        <div class="mt-1 text-sm text-bp-gray-500">Not every enquiry becomes a project.</div>
                    </div>
                    <div class="p-5 rounded-xl border border-bp-gray-200 bg-white">
                        <div class="text-sm font-semibold text-bp-black">Fast response</div>
                        <div class="mt-1 text-sm text-bp-gray-500">Within 24 hours (business days).</div>
                    </div>
                </div>
            </div>

            {{-- RIGHT PANEL --}}
            <div class="animate-fade-in-up animate-delay-200">
                <div class="bg-white rounded-2xl border border-bp-gray-200 shadow-lg overflow-hidden">
                    <div class="px-8 py-6 bg-gradient-to-br from-bp-black to-bp-gray-900">
                        <h2 class="text-lg font-semibold text-white">Who we work with</h2>
                        <p class="text-sm text-bp-gray-400 mt-1">A quick fit check</p>
                    </div>

                    <div class="p-8 space-y-6">
                        <div>
                            <div class="text-sm font-semibold text-bp-black mb-3">We’re a fit if:</div>
                            <ul class="space-y-2 text-sm text-bp-gray-600">
                                <li class="flex gap-2">
                                    <span class="text-bp-red font-bold">•</span>
                                    You’re serious about the business (not “just testing”).
                                </li>
                                <li class="flex gap-2">
                                    <span class="text-bp-red font-bold">•</span>
                                    You want clarity on scope, cost, and next steps.
                                </li>
                                <li class="flex gap-2">
                                    <span class="text-bp-red font-bold">•</span>
                                    You need a website that supports operations or sales.
                                </li>
                            </ul>
                        </div>

                        <div class="border-t border-bp-gray-200 pt-5">
                            <div class="text-sm font-semibold text-bp-black mb-3">Probably not a fit if:</div>
                            <ul class="space-y-2 text-sm text-bp-gray-600">
                                <li class="flex gap-2">
                                    <span class="text-bp-gray-400 font-bold">•</span>
                                    You want the cheapest option.
                                </li>
                                <li class="flex gap-2">
                                    <span class="text-bp-gray-400 font-bold">•</span>
                                    You expect a website to guarantee revenue.
                                </li>
                                <li class="flex gap-2">
                                    <span class="text-bp-gray-400 font-bold">•</span>
                                    You’re not ready to make decisions.
                                </li>
                            </ul>
                        </div>

                        <div class="rounded-xl bg-bp-gray-50 border border-bp-gray-200 p-5">
                            <div class="text-sm font-semibold text-bp-black">Start simple</div>
                            <div class="mt-1 text-sm text-bp-gray-600">
                                Step 1 is just your contact details.
                                If it’s a fit, we’ll request project details next.
                            </div>
                        </div>

                        <a href="{{ route('contact') }}"
                           class="w-full inline-flex items-center justify-center rounded-lg bg-bp-red hover:bg-bp-red-dark text-white font-semibold px-6 py-3 transition">
                            Contact →
                        </a>

                        <p class="text-xs text-bp-gray-400 leading-relaxed">
                            Your information is treated confidentially and never shared.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        {{-- WHAT WE DO --}}
        <section class="mt-16 lg:mt-20">
            <div class="flex items-end justify-between gap-6">
                <div>
                    <h2 class="text-2xl lg:text-3xl font-bold text-bp-black">What we actually do</h2>
                    <p class="mt-2 text-bp-gray-600 max-w-2xl">
                        We keep it simple: clarity, systems, execution.
                    </p>
                </div>
                <a href="{{ route('approach') }}" class="hidden sm:inline-flex text-sm font-semibold text-bp-black hover:text-bp-red transition">
                    Our approach →
                </a>
            </div>

            <div class="mt-8 grid md:grid-cols-3 gap-6">
                <div class="p-6 rounded-2xl bg-white border border-bp-gray-200 shadow-sm">
                    <div class="text-sm font-semibold text-bp-black">Strategy</div>
                    <p class="mt-2 text-sm text-bp-gray-600">
                        We clarify goals, constraints, and priorities before anything gets built.
                    </p>
                </div>

                <div class="p-6 rounded-2xl bg-white border border-bp-gray-200 shadow-sm">
                    <div class="text-sm font-semibold text-bp-black">Systems</div>
                    <p class="mt-2 text-sm text-bp-gray-600">
                        We design flows, structure, and integrations that reduce friction.
                    </p>
                </div>

                <div class="p-6 rounded-2xl bg-white border border-bp-gray-200 shadow-sm">
                    <div class="text-sm font-semibold text-bp-black">Execution</div>
                    <p class="mt-2 text-sm text-bp-gray-600">
                        Clean build, predictable process, and the right next step.
                    </p>
                </div>
            </div>
        </section>

        {{-- FINAL CTA --}}
        <section class="mt-16">
            <div class="rounded-2xl border border-bp-gray-200 bg-white p-8 lg:p-10 shadow-sm">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                    <div>
                        <h3 class="text-xl lg:text-2xl font-bold text-bp-black">Not sure yet?</h3>
                        <p class="mt-2 text-bp-gray-600 max-w-2xl">
                            Start with a short contact form. If it’s a fit, we’ll invite you to complete project intake.
                        </p>
                    </div>
                    <a href="{{ route('contact') }}"
                       class="inline-flex items-center justify-center rounded-lg bg-bp-black hover:bg-bp-gray-900 text-white font-semibold px-6 py-3 transition">
                        Start here →
                    </a>
                </div>
            </div>
        </section>

    </div>
</main>
@endsection
