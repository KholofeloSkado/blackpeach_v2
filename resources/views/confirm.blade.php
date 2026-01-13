<!DOCTYPE html>
<html>
<head>
    <title>Confirm Package - Blackpeach</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    {{-- ✅ CRITICAL: Laravel 11 Livewire Directives --}}
    @livewireStyles
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen py-12">
        @livewire('public.lead-confirmation', ['lead_id' => $lead_id])
    </div>
    
    {{-- ✅ CRITICAL: Livewire JavaScript --}}
    @livewireScripts
</body>
</html>
