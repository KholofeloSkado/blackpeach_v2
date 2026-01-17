{{-- resources/views/livewire/public/lead-confirmation.blade.php --}}
<div class="relative space-y-8">
    {{-- Loading overlay (must be INSIDE the single root element) --}}
    <div wire:loading.flex wire:target="submit"
         class="absolute inset-0 z-20 items-center justify-center bg-white/80 backdrop-blur-sm rounded-2xl">
        <div class="flex flex-col items-center gap-3 bg-[#1e293b]">
            {{-- Spinner --}}
            <svg class="h-8 w-8 animate-spin text-bp-red" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
            </svg>

            <div class="text-sm font-medium text-bp-black">Submitting your details…</div>
            <div class="text-xs text-bp-gray-500">This takes a few seconds.</div>
        </div>
    </div>

    <div class="space-y-8">
        {{-- Honeypot --}}
        <input type="text" wire:model.defer="website" class="hidden" tabindex="-1" autocomplete="off">

        <div>
            <h3 class="text-2xl font-semibold text-bp-black">Project Details</h3>
            <p class="mt-1 text-sm text-bp-gray-500">Complete your intake so we can respond accurately.</p>
        </div>

        {{-- Lead Summary Card --}}
        <div class="rounded-xl border border-bp-gray-200 bg-bp-gray-50 p-5 bg-[#B10000] hover:bg-[#8a0000] text-white">
            <div class="text-sm text-bp-gray-600">You're submitting as</div>
            <div class="mt-1 text-base font-semibold text-bp-black">
                {{ $this->lead->name }} • {{ $this->lead->email }}
            </div>
            <div class="mt-1 text-sm text-bp-gray-500">
                {{ $this->lead->phone }}
            </div>
        </div>

        <form wire:submit.prevent="submit" class="space-y-8">
            {{-- BUSINESS READINESS --}}
            <div>
                <h4 class="text-lg font-semibold text-bp-black mb-4">Business readiness</h4>
                
                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-bp-gray-700 mb-2">
                            Are you the final decision maker? <span class="text-bp-red">*</span>
                        </label>
                        <select wire:model.defer="is_decision_maker" required
                                class="text-[#1e293b] w-full rounded-lg border border-bp-gray-200 px-4 py-3 bp-focus">
                            <option value="">Select…</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                        @error('is_decision_maker') <p class="mt-1 text-xs text-bp-red">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-bp-gray-700 mb-2">
                            Is the business currently operating? <span class="text-bp-red">*</span>
                        </label>
                        <select wire:model.defer="operating_status" required
                                class="text-[#1e293b] w-full rounded-lg border border-bp-gray-200 px-4 py-3 bp-focus">
                            <option value="">Select…</option>
                            <option value="yes">Yes</option>
                            <option value="pre-launch">Pre-launch</option>
                            <option value="no">No</option>
                        </select>
                        @error('operating_status') <p class="text-[#1e293b] mt-1 text-xs text-bp-red">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-bp-gray-700 mb-2">
                            Do you currently have paying customers? <span class="text-bp-red">*</span>
                        </label>
                        <select wire:model.defer="has_paying_customers" required
                                class="text-[#1e293b] w-full rounded-lg border border-bp-gray-200 px-4 py-3 bp-focus">
                            <option value="">Select…</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                        @error('has_paying_customers') <p class="text-[#1e293b] mt-1 text-xs text-bp-red">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            {{-- BUDGET & PAYMENT --}}
            <div>
                <h4 class="text-lg font-semibold text-bp-black mb-4">Budget & payment</h4>
                
                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-bp-gray-700 mb-2">
                            What is your allocated budget range? <span class="text-bp-red">*</span>
                        </label>
                        <select wire:model.defer="budget_range" required
                                class="text-[#1e293b] w-full rounded-lg border border-bp-gray-200 px-4 py-3 bp-focus">
                            <option value="">Select…</option>
                            @foreach($budgetRanges as $val => $label)
                                <option value="{{ $val }}">{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('budget_range') <p class="text-[#1e293b] mt-1 text-xs text-bp-red">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-bp-gray-700 mb-2">
                            How will you pay for this project? <span class="text-bp-red">*</span>
                        </label>
                        <select wire:model.defer="payment_readiness" required
                                class="text-[#1e293b] w-full rounded-lg border border-bp-gray-200 px-4 py-3 bp-focus">
                            <option value="">Select…</option>
                            <option value="allocated">Budget already allocated</option>
                            <option value="owner_funded">Owner funded</option>
                            <option value="website_must_generate_money">We need the website to generate money first</option>
                        </select>
                        <p class="mt-2 text-xs text-bp-gray-400">This helps us recommend the right next step.</p>
                        @error('payment_readiness') <p class="text-[#1e293b] mt-1 text-xs text-bp-red">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            {{-- WEBSITE GOAL --}}
            <div>
                <h4 class="text-lg font-semibold text-bp-black mb-4">Website goal</h4>
                
                <div>
                    <label class="block text-sm font-medium text-bp-gray-700 mb-2">
                        Primary goal for the website <span class="text-bp-red">*</span>
                    </label>
                    <select wire:model.defer="primary_goal" required
                            class="text-[#1e293b] w-full rounded-lg border border-bp-gray-200 px-4 py-3 bp-focus">
                        <option value="">Select…</option>
                        @foreach($goals as $val => $label)
                            <option value="{{ $val }}">{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('primary_goal') <p class="text-[#1e293b] mt-1 text-xs text-bp-red">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- EMAIL SETUP (OPTIONAL) --}}
            <div>
                <h4 class="text-lg font-semibold text-bp-black mb-4">Email setup (optional)</h4>
                
                <div class="space-y-5">
                    <label class="flex items-start gap-3 text-sm text-bp-gray-700">
                        <input type="checkbox" wire:model.defer="needs_professional_email_setup"
                               class="mt-1 rounded border-bp-gray-300 text-bp-red focus:ring-bp-red">
                        <span>I need professional email accounts (e.g. you@mycompany.co.za)</span>
                    </label>

                    <div>
                        <label class="block text-sm font-medium text-bp-gray-700 mb-2">
                            How many email accounts do you need?
                        </label>
                        <input type="number" min="1" max="50" wire:model.defer="email_accounts_needed"
                               class="text-[#1e293b] w-full rounded-lg border border-bp-gray-200 px-4 py-3 bp-focus"
                               placeholder="e.g. 3">
                        @error('email_accounts_needed') <p class="text-[#1e293b] mt-1 text-xs text-bp-red">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            {{-- SUBMIT BUTTON --}}
            <button type="submit"
                    wire:loading.attr="disabled"
                    wire:target="submit"
                    class="w-full rounded-lg bg-[#B10000] hover:bg-[#8a0000] text-white font-semibold py-3 transition disabled:opacity-60 disabled:cursor-not-allowed">
                <span wire:loading.remove wire:target="submit">Confirm & Submit →</span>
                <span wire:loading.inline wire:target="submit">Processing…</span>
            </button>

            <p class="text-xs text-bp-gray-400 leading-relaxed">
                By submitting, you agree we may contact you about your request.
            </p>
        </form>
    </div>
</div>