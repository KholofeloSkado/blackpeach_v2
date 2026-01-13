<!DOCTYPE html>
<html>
<head>
    <title>Admin - @yield('title', 'ServiceHub Pro')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="bg-gray-100 font-sans antialiased">
    <nav class="bg-gradient-to-r from-blue-600 to-blue-700 text-white p-6 shadow-2xl">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('admin.dashboard') }}" class="text-2xl font-bold tracking-wide">
                📊 ServiceHub Pro Admin
            </a>
            <div class="flex items-center space-x-4">
                <a href="{{ route('admin.leads.index') }}" class="hover:bg-blue-500 px-4 py-2 rounded-lg transition">
                    📋 Leads
                </a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg transition">
                        🚪 Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>
    <main class="container mx-auto py-12 px-4">
        @yield('content')
    </main>
</body>
</html>