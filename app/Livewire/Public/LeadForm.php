<?php

namespace App\Livewire\Public;

use Livewire\Component;
use App\Models\Lead;
use App\Models\ProjectIntake;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class LeadForm extends Component
{
    // -----------------------------
    // Contact fields ONLY (Lead table)
    // -----------------------------
    public string $name = '';
    public string $email = ''; // required

    public string $phone_country = 'ZA';
    public string $phone_national = '';

    public ?string $business_name = null;
    public ?string $current_website = null;
    public ?string $message = null;

    // -----------------------------
    // Spam protection
    // -----------------------------
    public ?string $website = null; // honeypot must stay empty

    protected function rules(): array
    {
        return [
            'name'  => 'required|string|min:2|max:255',
            'email' => 'required|email:rfc,dns|max:255',

            'phone_country'  => 'required|string|in:ZA,BW,NA,ZW,MZ,KE,NG,GB,US,AU,AE,IN',
            'phone_national' => 'required|string|min:7|max:20|regex:/^[0-9\s\-\(\)]+$/',

            'business_name'   => 'nullable|string|max:255',
            'current_website' => 'nullable|url|max:255',
            'message'         => 'nullable|string|max:2000',

            // Honeypot
            'website' => 'prohibited',
        ];
    }

    public function submit()
    {
        // Rate limit to reduce bot spam
        $key = 'leadform:' . request()->ip();

        if (RateLimiter::tooManyAttempts($key, 8)) {
            throw ValidationException::withMessages([
                'name' => 'Too many attempts. Please try again shortly.',
            ]);
        }
        RateLimiter::hit($key, 60);

        $validated = $this->validate();

        // Normalize email
        $email = mb_strtolower(trim($validated['email']));

        // Normalize phone (digits only)
        $phoneNational = preg_replace('/[^\d]/', '', $validated['phone_national']);

        // Format phone as E.164 (requires laravel-phone helper "phone()")
        try {
            $phoneE164 = phone($phoneNational, $validated['phone_country'])->formatE164();
        } catch (\Throwable $e) {
            throw ValidationException::withMessages([
                'phone_national' => 'Enter a valid phone number for the selected country.',
            ]);
        }

        // Create Lead (contact-only)
        $lead = Lead::create([
            'name'            => trim($validated['name']),
            'phone'           => $phoneE164,
            'email'           => $email,
            'business_name'   => $validated['business_name'] ? trim($validated['business_name']) : null,
            'current_website' => $validated['current_website'] ? trim($validated['current_website']) : null,
            'message'         => $validated['message'] ? trim($validated['message']) : null,

            'status'          => 'new',
            'source'          => 'website',
        ]);

        // Ensure one empty intake row exists (Step 2 will fill it)
        ProjectIntake::firstOrCreate(['lead_id' => $lead->id]);

        // Redirect to confirm/intake step (token-based)
        return $this->redirectRoute('public.confirm', ['token' => $lead->public_token]);
    }

    public function render()
    {
        $countries = [
            'ZA' => 'South Africa (+27)',
            'BW' => 'Botswana (+267)',
            'NA' => 'Namibia (+264)',
            'ZW' => 'Zimbabwe (+263)',
            'MZ' => 'Mozambique (+258)',
            'KE' => 'Kenya (+254)',
            'NG' => 'Nigeria (+234)',
            'GB' => 'United Kingdom (+44)',
            'US' => 'United States (+1)',
            'AU' => 'Australia (+61)',
            'AE' => 'UAE (+971)',
            'IN' => 'India (+91)',
        ];

        return view('livewire.public.lead-form', compact('countries'));
    }
}