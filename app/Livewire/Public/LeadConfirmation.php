<?php

namespace App\Livewire\Public;

use Livewire\Component;
use App\Models\Lead;
use App\Models\ProjectIntake;
use App\Mail\IntakeCompletedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class LeadConfirmation extends Component
{
    public string $token;

    public Lead $lead;
    public ProjectIntake $intake;

    // Intake fields (match schema exactly)
    public bool $needs_professional_email_setup = false;
    public ?int $email_accounts_needed = null;

    public ?bool $is_decision_maker = null;
    public ?string $operating_status = null; // yes|pre-launch|no
    public ?bool $has_paying_customers = null;

    public ?string $budget_range = null;      // under_5k|5_8k|8_15k|15k_plus
    public ?string $payment_readiness = null; // allocated|owner_funded|website_must_generate_money
    public ?string $primary_goal = null;      // credibility|leads|bookings|ecommerce|not_sure

    public function mount(string $token): void
    {
        $this->token = $token;

        $lead = Lead::where('public_token', $token)->first();

        if (! $lead) {
            throw ValidationException::withMessages([
                'token' => 'This link is invalid or expired.',
            ]);
        }

        $this->lead = $lead;

        // Ensure ONE intake row exists
        $this->intake = ProjectIntake::firstOrCreate(['lead_id' => $lead->id]);

        // Pre-fill if returning to page
        $this->needs_professional_email_setup = (bool) $this->intake->needs_professional_email_setup;
        $this->email_accounts_needed = $this->intake->email_accounts_needed;

        $this->is_decision_maker = $this->intake->is_decision_maker;
        $this->operating_status = $this->intake->operating_status;
        $this->has_paying_customers = $this->intake->has_paying_customers;

        $this->budget_range = $this->intake->budget_range;
        $this->payment_readiness = $this->intake->payment_readiness;
        $this->primary_goal = $this->intake->primary_goal;
    }

    protected function rules(): array
    {
        return [
            'needs_professional_email_setup' => 'boolean',
            'email_accounts_needed' => 'nullable|integer|min:1|max:50|required_if:needs_professional_email_setup,true',

            'is_decision_maker' => 'required|boolean',
            'operating_status' => 'required|string|in:yes,pre-launch,no',
            'has_paying_customers' => 'required|boolean',

            'budget_range' => 'required|string|in:under_5k,5_8k,8_15k,15k_plus',
            'payment_readiness' => 'required|string|in:allocated,owner_funded,website_must_generate_money',
            'primary_goal' => 'required|string|in:credibility,leads,bookings,ecommerce,not_sure',
        ];
    }

    public function submit()
    {
        $validated = $this->validate();

        // Save intake answers
        $this->intake->update([
            'needs_professional_email_setup' => (bool) ($validated['needs_professional_email_setup'] ?? false),
            'email_accounts_needed' => $validated['email_accounts_needed'] ?? null,

            'is_decision_maker' => (bool) $validated['is_decision_maker'],
            'operating_status' => $validated['operating_status'],
            'has_paying_customers' => (bool) $validated['has_paying_customers'],

            'budget_range' => $validated['budget_range'],
            'payment_readiness' => $validated['payment_readiness'],
            'primary_goal' => $validated['primary_goal'],
        ]);

        // Mark lead as intake completed (still no scoring here)
        $this->lead->update([
            'status' => 'intake_completed',
        ]);

        // ✅ Email client + notify Nina (admin) — no duplicates, no crashes
        try {
            $leadEmail  = $this->lead->email;
            $adminEmail = config('mail.notify_address');

            // Client email
            if (!empty($leadEmail)) {
                Mail::to($leadEmail)->send(new IntakeCompletedMail($this->lead, $this->intake, false));
            }

            // Admin email (Nina) — only if present and not same as client
            if (!empty($adminEmail) && $adminEmail !== $leadEmail) {
                Mail::to($adminEmail)->send(new IntakeCompletedMail($this->lead, $this->intake, true));
            }
        } catch (\Throwable $e) {
            logger()->error('IntakeCompletedMail failed', [
                'lead_id' => $this->lead->id ?? null,
                'lead_email' => $this->lead->email ?? null,
                'admin_email' => config('mail.notify_address'),
                'error' => $e->getMessage(),
            ]);
        }

        // Use Livewire redirect helper (avoids return type mismatch issues)
        return $this->redirectRoute('public.thankyou');
    }

    public function render()
    {
        $budgetRanges = [
            'under_5k' => 'Under R5k',
            '5_8k' => 'R5–8k',
            '8_15k' => 'R8–15k',
            '15k_plus' => 'R15k+',
        ];

        $goals = [
            'credibility' => 'Credibility',
            'leads' => 'Leads',
            'bookings' => 'Bookings',
            'ecommerce' => 'Ecommerce',
            'not_sure' => 'Not sure',
        ];

        return view('livewire.public.lead-confirmation', compact('budgetRanges', 'goals'));
    }
}
