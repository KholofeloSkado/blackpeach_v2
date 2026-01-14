<footer class="border-t border-slate-200 bg-white">
  <div class="mx-auto max-w-7xl px-4 py-10">
    <div class="grid gap-8 md:grid-cols-4">
      <div class="md:col-span-2">
        <div class="flex items-center gap-2">
          <img src="{{ asset('images/logo-mark.png') }}" alt="Blackpeach" class="h-7 w-7">
          <span class="text-lg font-semibold tracking-tight">Blackpeach</span>
        </div>
        <p class="mt-3 max-w-md text-sm text-slate-600">
          We design and build digital systems that convert — without noise.
          Clear scope. Clear process. Paid work. Imagine that.
        </p>
      </div>

      <div>
        <h3 class="text-sm font-semibold text-slate-900">Company</h3>
        <ul class="mt-3 space-y-2 text-sm">
          <li><a class="text-slate-600 hover:text-slate-900" href="{{ route('approach') }}">Our Approach</a></li>
          <li><a class="text-slate-600 hover:text-slate-900" href="{{ route('how-it-works') }}">How It Works</a></li>
          <li><a class="text-slate-600 hover:text-slate-900" href="{{ route('why') }}">Why Blackpeach</a></li>
          <li><a class="text-slate-600 hover:text-slate-900" href="{{ route('contact') }}">Contact</a></li>
        </ul>
      </div>

      <div>
        <h3 class="text-sm font-semibold text-slate-900">Legal</h3>
        <ul class="mt-3 space-y-2 text-sm">
          <li><a class="text-slate-600 hover:text-slate-900" href="{{ route('privacy') }}">Privacy Policy</a></li>
          <li><a class="text-slate-600 hover:text-slate-900" href="{{ route('terms') }}">Terms</a></li>
        </ul>
      </div>
    </div>

    <div class="mt-10 flex flex-col gap-3 border-t border-slate-200 pt-6 md:flex-row md:items-center md:justify-between">
      <p class="text-xs text-slate-500">
        © {{ date('Y') }} Blackpeach Consulting. All rights reserved.
      </p>

      <div class="flex gap-4 text-xs">
        <a class="text-slate-500 hover:text-slate-900" href="{{ route('privacy') }}">Privacy</a>
        <a class="text-slate-500 hover:text-slate-900" href="{{ route('terms') }}">Terms</a>
      </div>
    </div>
  </div>
</footer>
