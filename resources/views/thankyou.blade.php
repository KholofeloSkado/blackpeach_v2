<!DOCTYPE html>
<html>
<head>
    <title>Thank You! - ServiceHub Pro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <div class="max-w-2xl mx-auto p-8">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-xl mb-8">
                {{ session('success') }}
            </div>
        @elseif(session('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-xl mb-8">
                {{ session('message') }}
            </div>
        @endif

        
        <div class="text-center bg-white rounded-3xl shadow-2xl p-12">
            <div class="w-24 h-24 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-8">
                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Perfect!</h1>
            <p class="text-xl text-gray-600 mb-8">Your requirements document has been sent to your email.</p>
            
            <div class="bg-blue-50 border-2 border-blue-200 rounded-2xl p-8 mb-8">
                <h3 class="text-2xl font-bold text-blue-800 mb-4">What's Next?</h3>
                <div class="space-y-3 text-lg">
                    <div>• Check your email for {{ $lead_id }} document</div>
                    <div>• Expect WhatsApp contact within 24 hours</div>
                    <div>• Review + approve via reply</div>
                </div>
            </div>
            
            <a href="/" class="inline-block bg-gradient-to-r from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 text-white px-12 py-4 rounded-2xl text-xl font-bold transition-all">
                ← Back to Home
            </a>
        </div>
    </div>
</body>
</html>
