<div class="space-y-8">
    {{-- Honeypot --}}
    <input type="text" wire:model.defer="website" class="hidden" tabindex="-1" autocomplete="off">

    <div>
        <h3 class="text-2xl font-semibold text-bp-black">Contact</h3>
        <p class="mt-1 text-sm text-bp-gray-500">Share your details. We’ll respond within 24 hours.</p>
    </div>

    <form wire:submit.prevent="submit" class="space-y-8">
        {{-- CONTACT DETAILS --}}
        <div class="grid md:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-medium text-bp-gray-700 mb-2">
                    Full name <span class="text-bp-red">*</span>
                </label>
                <input type="text" wire:model.defer="name" required
                       class="w-full rounded-lg border border-bp-gray-200 px-4 py-3 bp-focus"
                       autocomplete="name">
                @error('name') <p class="mt-1 text-xs text-bp-red">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-bp-gray-700 mb-2">
                    Email <span class="text-bp-red">*</span>
                </label>
                <input type="email" wire:model.defer="email" required
                       class="w-full rounded-lg border border-bp-gray-200 px-4 py-3 bp-focus"
                       autocomplete="email" placeholder="you@company.com">
                @error('email') <p class="mt-1 text-xs text-bp-red">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-medium text-bp-gray-700 mb-2">
                    Phone / WhatsApp <span class="text-bp-red">*</span>
                </label>

                <div class="grid grid-cols-3 gap-3">
                    <select wire:model.defer="phone_country"
                            class="col-span-1 rounded-lg border border-bp-gray-200 px-3 py-3 bp-focus">
                        @foreach($countries as $code => $label)
                            <option value="{{ $code }}">{{ $label }}</option>
                        @endforeach
                    </select>

                    <input type="tel" wire:model.defer="phone_national" required
                           class="col-span-2 rounded-lg border border-bp-gray-200 px-4 py-3 bp-focus"
                           inputmode="tel" placeholder="e.g. 83 123 4567">
                </div>

                <p class="mt-2 text-xs text-bp-gray-400">We’ll format your number automatically.</p>

                @error('phone_country') <p class="mt-1 text-xs text-bp-red">{{ $message }}</p> @enderror
                @error('phone_national') <p class="mt-1 text-xs text-bp-red">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-bp-gray-700 mb-2">Business name</label>
                <input type="text" wire:model.defer="business_name"
                       class="w-full rounded-lg border border-bp-gray-200 px-4 py-3 bp-focus"
                       autocomplete="organization">
                @error('business_name') <p class="mt-1 text-xs text-bp-red">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-5">
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-bp-gray-700 mb-2">Message (optional)</label>
                <textarea wire:model.defer="message" rows="3"
                          class="w-full rounded-lg border border-bp-gray-200 px-4 py-3 bp-focus"
                          placeholder="One sentence about what you need"></textarea>
                @error('message') <p class="mt-1 text-xs text-bp-red">{{ $message }}</p> @enderror
            </div>
        </div>

        <button type="submit"
                class="w-full rounded-lg bg-bp-black hover:bg-bp-gray-900 text-white font-semibold py-3 transition">
            Continue →
        </button>

        <p class="text-xs text-bp-gray-400 leading-relaxed">
            By submitting, you agree we may contact you by email/WhatsApp regarding your request.
        </p>
    </form>
</div>
