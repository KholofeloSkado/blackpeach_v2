<!DOCTYPE html>
<html>
<head>
    <title>Admin OTP Verification - ServiceHub Pro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-slate-100 to-blue-50 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-2xl rounded-3xl p-10 w-full max-w-md border border-slate-200">
        <div class="text-center mb-8">
            <div class="w-20 h-20 bg-blue-100 rounded-2xl mx-auto mb-4 flex items-center justify-center">
                <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-slate-900 mb-2">
                Verify Your Identity
            </h1>
            <p class="text-slate-600">
                Enter the 6-digit code sent to your admin email
            </p>
        </div>

        {{-- Step 2: OTP input ONLY --}}
        @if(session('debug_otp'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-2 rounded-lg mb-4">
                Debug OTP: <strong>{{ session('debug_otp') }}</strong>
            </div>
        @endif


        <form method="POST" action="{{ route('otp.handle') }}" class="space-y-6">
            @csrf

            @if ($errors->any())
                <div class="bg-red-50 border-2 border-red-200 text-red-700 px-4 py-3 rounded-xl text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-3 text-center">
                    6-Digit Code
                </label>
                <div class="flex gap-2 justify-center">
                    <input
                        type="text"
                        name="otp"
                        maxlength="6"
                        value="{{ old('otp') }}"
                        class="w-16 h-16 text-2xl font-mono font-bold text-center border-2 border-slate-200 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100 shadow-sm transition"
                        placeholder="_"
                        required
                        autocomplete="one-time-code"
                        pattern="[A-Za-z0-9]{6}"
                    >
                </div>
                <p class="mt-3 text-xs text-slate-500 text-center">
                    Code expires in <span id="countdown">3:00</span>
                </p>
            </div>

            <div class="flex flex-col sm:flex-row gap-3">
                <a href="{{ route('login') }}"
                   class="flex-1 text-center py-3 px-6 border border-slate-200 text-slate-700 rounded-xl hover:bg-slate-50 transition text-sm font-medium">
                    ← Back to Login
                </a>
                <button
                    type="submit"
                    class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-xl transition shadow-lg text-sm"
                >
                    Verify & Login
                </button>
            </div>
        </form>

        <div class="mt-6 pt-6 border-t border-slate-200 text-center">
            <p class="text-xs text-slate-500 mb-2">
                Didn't receive code? 
                <button onclick="document.getElementById('resend-form').submit()" 
                        class="text-blue-600 hover:underline font-medium">
                    Resend OTP
                </button>
            </p>
            
            {{-- Hidden resend form --}}
            <form id="resend-form" method="POST" action="{{ route('otp.resend') }}" class="hidden">
                @csrf
            </form>
            
            {{-- Success message --}}
            @if (session('message'))
                <div class="mt-3 bg-green-50 border border-green-200 text-green-700 px-3 py-2 rounded-lg text-xs">
                    {{ session('message') }}
                </div>
            @endif
        </div>

    </div>

    <script>
        // 3-minute countdown timer
        let timeLeft = 180; // 3 minutes
        const countdownEl = document.getElementById('countdown');
        
        const timer = setInterval(() => {
            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
            countdownEl.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;
            
            if (timeLeft <= 0) {
                clearInterval(timer);
                countdownEl.textContent = 'Expired';
            }
            timeLeft--;
        }, 1000);
    </script>
</body>
</html>
