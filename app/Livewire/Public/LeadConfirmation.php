<?php

namespace App\Livewire\Public;

use Livewire\Component;
use App\Services\RequirementsDocumentService;
use App\Models\Lead;
use Illuminate\Support\Facades\Log;

class LeadConfirmation extends Component
{
    public int $lead_id;

    public ?Lead $lead = null;

    public string $package = 'business_plus';
    public array $extras = ['dns' => false, 'hosting' => false, 'seo_profile' => true];
    public float|int $total = 6780;
    public bool $loading = false;

    public function mount(int $lead_id): void
    {
        $this->lead_id = $lead_id;
        $this->loadLead();
    }

    public function loadLead(): void
    {
        $this->lead = Lead::findOrFail($this->lead_id);
        $this->package = $this->lead->package_selected ?? 'business_plus';
        $this->extras = $this->lead->extras_json ?? ['dns' => false, 'hosting' => false, 'seo_profile' => true];
        $this->calculateTotal();
    }

    public function updatedPackage(): void
    {
        $this->calculateTotal();
    }

    public function updatedExtras(): void
    {
        $this->calculateTotal();
    }

    public function calculateTotal(): void
    {
        $packages = ['business_plus' => 6780, 'executive_pro' => 13990];
        $base = $packages[$this->package] ?? 6780;

        $extras = 0;
        if (!empty($this->extras['dns'])) $extras += 80;
        if (!empty($this->extras['hosting'])) $extras += 1200;
        if (!empty($this->extras['seo_profile'])) $extras += 250;

        $this->total = $base + $extras;
    }

    public function confirmRequirements(RequirementsDocumentService $service)
    {
        Log::info('🔥 confirmRequirements START');
        $this->loading = true;

        try {
            Log::info('Loading lead: ' . $this->lead_id);
            $lead = Lead::findOrFail($this->lead_id);

            Log::info('Updating lead with package: ' . $this->package);

            $packages = ['business_plus' => 6780, 'executive_pro' => 13990];

            $extrasCost =
                (!empty($this->extras['dns']) ? 80 : 0) +
                (!empty($this->extras['hosting']) ? 1200 : 0) +
                (!empty($this->extras['seo_profile']) ? 250 : 0);

            $total = ($packages[$this->package] ?? 6780) + $extrasCost;

            $lead->update([
                'package_selected' => $this->package,
                'extras_json'      => $this->extras,
                'total_cost'       => $total,
                'status'           => 'confirmed',
            ]);

            Log::info('Generating PDF...');
            $filename = $service->sendToLead($lead);
            Log::info('PDF generated: ' . $filename);

            $this->loading = false;

            // ✅ FIX: your route is now /thankyou (no ID in URL)
            Log::info('✅ Redirecting to route public.thankyou (stateless). Internal lead id: ' . $lead->id);

            return $this->redirectRoute('public.thankyou', navigate: true);

        } catch (\Throwable $e) {
            $this->loading = false;

            Log::error('❌ ERROR: ' . $e->getMessage());
            Log::error('❌ TRACE: ' . $e->getTraceAsString());

            throw $e; // keep this for debugging while building
        }
    }

    public function render()
    {
        $packages = [
            'business_plus'  => 'Business Plus - R6,780',
            'executive_pro'  => 'Executive Pro - R13,990',
        ];

        return view('livewire.public.lead-confirmation', compact('packages'));
    }

    public function testButton(): void
    {
        session()->flash('message', '🔥 LIVEWIRE WORKS! Button clicked.');
        $this->dispatch('alert', message: 'Test successful!');
    }
}
