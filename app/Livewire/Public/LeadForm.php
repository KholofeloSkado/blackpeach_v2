<?php

namespace App\Livewire\Public;

use Livewire\Component;
use App\Models\Lead;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class LeadForm extends Component
{
    // UI fields
    public string $name = '';
    public ?string $email = null;

    // Phone split (safer UX + easier validation)
    public string $phone_country = 'ZA';     // dropdown (ZA default)
    public string $phone_national = '';      // digits user types

    public ?string $business_name = null;
    public ?string $current_website = null;

    // Keep your pricing defaults (still fine for now)
    public string $package = 'business_plus';
    public array $extras = [
        'dns' => false,
        'hosting' => false,
        'seo_profile' => true,
    ];

    // Honeypot (spam trap)
    public ?string $website = null; // must stay empty

    protected function rules(): array
    {
        return [
            'name' => 'required|string|min:2|max:255',

            // Email hardening
            'email' => 'nullable|email:rfc,dns|max:255',

            // Country + phone hardening
            'phone_country'  => 'required|string|in:ZA,US,GB,AU,CA,DE,FR,NL,IE,KE,NG,BW,ZW,NA,MZ,AE,IN',
            'phone_national' => 'required|string|min:7|max:20|regex:/^[0-9\s\-\(\)]+$/',

            'business_name'   => 'nullable|string|max:255',
            'current_website' => 'nullable|url|max:255',

            'package' => 'required|string|in:business_plus,executive_pro',
            'extras' => 'array',
            'extras.dns' => 'boolean',
            'extras.hosting' => 'boolean',
            'extras.seo_profile' => 'boolean',

            // Honeypot must be empty
            'website' => 'nullable|size:0',
        ];
    }

    public function submit()
    {
        // Rate limit: stops bots hammering /livewire/update
        $key = 'contact:' . request()->ip();
        if (RateLimiter::tooManyAttempts($key, 8)) {
            throw ValidationException::withMessages([
                'name' => 'Too many attempts. Please try again shortly.',
            ]);
        }
        RateLimiter::hit($key, 60);

        $validated = $this->validate();

        // Normalize email
        $email = $this->email ? mb_strtolower(trim($this->email)) : null;

        // Normalize phone input
        $phoneNational = preg_replace('/[^\d]/', '', $this->phone_national);

        // Validate + format phone using libphonenumber (laravel-phone)
        // Store as E.164 (best practice)
        $phoneE164 = phone($phoneNational, $this->phone_country)->formatE164();

        // Pricing logic (kept)
        $packages = [
            'business_plus' => 6780,
            'executive_pro' => 13990,
        ];

        $extrasCost =
            (!empty($this->extras['dns']) ? 80 : 0) +
            (!empty($this->extras['hosting']) ? 1200 : 0) +
            (!empty($this->extras['seo_profile']) ? 250 : 0);

        $total = ($packages[$this->package] ?? 6780) + $extrasCost;

        $lead = Lead::create([
            'name'            => trim($this->name),
            'phone'           => $phoneE164,
            'email'           => $email,
            'business_name'   => $this->business_name ? trim($this->business_name) : null,
            'current_website' => $this->current_website ? trim($this->current_website) : null,

            'package_selected'=> $this->package,
            'extras_json'     => $this->extras,
            'total_cost'      => $total,
            'status'          => 'new',
            'source'          => 'website',
        ]);

        return $this->redirectRoute('public.confirm', ['token' => $lead->public_token]);
    }

    public function render()
    {
        // Small curated list — premium, not noisy
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
