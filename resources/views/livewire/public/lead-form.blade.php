<div class="max-w-2xl mx-auto p-8 bg-white rounded-xl shadow-lg">
    @if($formSubmitted)
        <div class="text-center p-12">
            <div class="w-24 h-24 bg-green-100 rounded-full mx-auto mb-8 flex items-center justify-center">
                <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Thank You!</h2>
            <p class="text-xl text-gray-600 mb-8">Your details have been received.</p>
            <div class="bg-gray-50 p-6 rounded-lg mb-8">
                <h3 class="font-semibold text-gray-900 mb-2">Reference Number</h3>
                <div class="text-2xl font-mono font-bold text-blue-600 tracking-wide">
                    {{ $reference_number }}
                </div>
            </div>
            <a href="/" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold">
                Return Home
            </a>
        </div>
    @else
        <form wire:submit="submit" class="space-y-6">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Get Your Free Quote</h1>
            
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Full Name *</label>
                    <input type="text" wire:model="name" class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Phone *</label>
                    <input type="tel" wire:model="phone" class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                    @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg text-lg">
                📋 Get My Custom Quote
            </button>
        </form>
    @endif
</div>

<script src="https://unpkg.com/livewire@3/dist/livewire.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
