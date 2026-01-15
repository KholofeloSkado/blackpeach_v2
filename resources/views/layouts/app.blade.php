<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', config('app.name'))</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-white text-slate-900">
  <x-navbar />

  <main class="min-h-[70vh]">
    {{ $slot ?? '' }}
    @yield('content')
  </main>

  <x-footer />
</body>
</html>
