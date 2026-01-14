<div class="bg-white rounded-2xl shadow-sm ring-1 ring-black/5 p-8">
    <div class="mb-8">
        <h1 class="text-3xl font-semibold tracking-tight text-neutral-900">Contact</h1>
        <p class="mt-2 text-neutral-600">
            Share your details. We’ll respond within 24 hours.
        </p>
    </div>

    <form wire:submit.prevent="submit" class="space-y-6">
        {{-- Honeypot (hidden) --}}
        <div class="hidden">
            <label>Website</label>
            <input type="text" wire:model="website" tabindex="-1" autocomplete="off">
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-neutral-700 mb-2">Full name *</label>
                <input
                    type="text"
                    wire:model.defer="name"
                    autocomplete="name"
                    class="w-full px-4 py-3 border border-neutral-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-neutral-900/20"
                    required
                >
                @error('name') <div class="mt-2 text-sm text-red-600">{{ $message }}</div> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-neutral-700 mb-2">Email (optional)</label>
                <input
                    type="email"
                    wire:model.defer="email"
                    autocomplete="email"
                    class="w-full px-4 py-3 border border-neutral-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-neutral-900/20"
                >
                @error('email') <div class="mt-2 text-sm text-red-600">{{ $message }}</div> @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-neutral-700 mb-2">Phone / WhatsApp *</label>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <select
                        wire:model.defer="phone_country"
                        class="w-full px-4 py-3 border border-neutral-200 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-neutral-900/20"
                    >
                        @foreach($countries as $code => $label)
                            <option value="{{ $code }}">{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('phone_country') <div class="mt-2 text-sm text-red-600">{{ $message }}</div> @enderror
                </div>

                <div class="md:col-span-2">
                    <input
                        type="tel"
                        wire:model.defer="phone_national"
                        inputmode="numeric"
                        autocomplete="tel"
                        placeholder="e.g. 83 123 4567"
                        class="w-full px-4 py-3 border border-neutral-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-neutral-900/20"
                        required
                    >
                    @error('phone_national') <div class="mt-2 text-sm text-red-600">{{ $message }}</div> @enderror
                    <p class="mt-2 text-xs text-neutral-500">
                        We’ll format your number automatically.
                    </p>
                </div>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-neutral-700 mb-2">Business name (optional)</label>
                <input
                    type="text"
                    wire:model.defer="business_name"
                    autocomplete="organization"
                    class="w-full px-4 py-3 border border-neutral-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-neutral-900/20"
                >
                @error('business_name') <div class="mt-2 text-sm text-red-600">{{ $message }}</div> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-neutral-700 mb-2">Current website (optional)</label>
                <input
                    type="url"
                    wire:model.defer="current_website"
                    placeholder="https://"
                    class="w-full px-4 py-3 border border-neutral-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-neutral-900/20"
                >
                @error('current_website') <div class="mt-2 text-sm text-red-600">{{ $message }}</div> @enderror
            </div>
        </div>

        <button
            type="submit"
            class="w-full rounded-xl bg-neutral-900 text-white font-semibold py-4 hover:bg-neutral-800 transition disabled:opacity-60"
            wire:loading.attr="disabled"
        >
            <span wire:loading.remove>Get my custom quote</span>
            <span wire:loading>Submitting…</span>
        </button>

        <p class="text-xs text-neutral-500">
            By submitting, you agree to be contacted about your enquiry.
        </p>
    </form>
</div>
