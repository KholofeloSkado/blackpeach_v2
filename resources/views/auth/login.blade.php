<!DOCTYPE html>
<html>
<head>
    <title>Admin Login - ServiceHub Pro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-md">
        <h1 class="text-2xl font-bold text-slate-900 mb-6 text-center">
            Admin Login
        </h1>

        {{-- Step 1: username/email + password ONLY --}}
        <form method="POST" action="{{ route('login.handle') }}" class="space-y-4">
            @csrf

            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-2 rounded-lg text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">
                    Email or Username
                </label>
                <input
                    type="text"
                    name="email"
                    value="{{ old('email') }}"
                    class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">
                    Password
                </label>
                <input
                    type="password"
                    name="password"
                    class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
                <p class="mt-1 text-xs text-slate-500">
                    8+ characters, include uppercase, number and special (no @ or !).
                </p>
            </div>

            <button
                type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition"
            >
                Continue to OTP
            </button>
        </form>

        <p class="mt-4 text-center text-xs text-slate-500">
            Step 1 of 2: After this, an OTP will be emailed and you’ll confirm it on the next screen.
        </p>
    </div>
</body>
</html>
