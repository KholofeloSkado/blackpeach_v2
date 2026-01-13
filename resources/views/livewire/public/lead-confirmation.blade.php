<div class="max-w-4xl mx-auto p-8">
    <div class="bg-white rounded-2xl shadow-2xl p-12">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent mb-4">
                Confirm Your Package
            </h1>
            <p class="text-xl text-gray-600">Review and confirm your selection</p>
        </div>

        <!-- Package Selection -->
        <div class="grid md:grid-cols-2 gap-12 mb-12">
            <div>
                <label class="block text-xl font-semibold text-gray-900 mb-4">Package</label>
                <select wire:model.live="package" class="w-full p-4 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-300 text-lg">
                    @foreach($packages as $key => $label)
                        <option value="{{ $key }}">{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Extras -->
            <div>
                <label class="block text-xl font-semibold text-gray-900 mb-6">Add-ons</label>
                <div class="space-y-4">
                    <label class="flex items-center p-4 border-2 border-dashed border-orange-200 rounded-xl hover:border-orange-300 transition">
                        <input type="checkbox" wire:model.live="extras.seo_profile" class="w-6 h-6 rounded">
                        <span class="ml-4 text-lg">
                            <span class="font-semibold text-orange-600">SEO Profile</span> 
                            <span class="text-gray-600">R250</span> 
                            <span class="text-sm text-orange-800 font-medium">(Essential)</span>
                        </span>
                    </label>
                    <label class="flex items-center p-4 border-2 border-dashed border-gray-200 rounded-xl hover:border-gray-300 transition">
                        <input type="checkbox" wire:model.live="extras.dns" class="w-6 h-6 rounded">
                        <span class="ml-4 text-lg">DNS Registration <span class="text-gray-600">R80</span></span>
                    </label>
                    <label class="flex items-center p-4 border-2 border-dashed border-gray-200 rounded-xl hover:border-gray-300 transition">
                        <input type="checkbox" wire:model.live="extras.hosting" class="w-6 h-6 rounded">
                        <span class="ml-4 text-lg">12 Months Hosting <span class="text-gray-600">R1,200</span></span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Total -->
        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border-4 border-blue-100 rounded-2xl p-8 mb-12">
            <div class="flex justify-between items-center text-2xl">
                <span class="font-semibold text-gray-800">Total Investment:</span>
                <span class="font-bold text-3xl text-blue-800 font-mono">R{{ number_format($total, 0) }}</span>
            </div>
        </div>

        <!-- SINGLE CONFIRM BUTTON -->
        <div class="text-center">
            <button wire:click="confirmRequirements" 
                    wire:loading.attr="disabled"
                    class="inline-flex items-center px-12 py-6 bg-gradient-to-r from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 text-white text-xl font-bold rounded-2xl shadow-2xl transform hover:-translate-y-1 transition-all duration-200 disabled:opacity-50">
                @if($loading)
                    <svg class="animate-spin -ml-1 mr-3 h-7 w-7" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Generating Requirements...
                @else
                    ✅ Confirm & Send Requirements Document
                @endif
            </button>
        </div>
    </div>
</div>
