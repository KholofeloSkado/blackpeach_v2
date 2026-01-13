<?php
namespace App\Livewire\Public;

use Livewire\Component;
use App\Services\RequirementsDocumentService;  // ✅ REQUIRED
use App\Models\Lead;                            // ✅ REQUIRED
use App\Mail\RequirementsVerification;          // ✅ REQUIRED

class LeadConfirmation extends Component
{
    public $lead_id;
    public $package = 'business_plus';
    public $extras = ['dns' => false, 'hosting' => false, 'seo_profile' => true];
    public $total = 6780;
    public $loading = false;
    public $lead;

    public function mount($lead_id)
    {
        $this->lead_id = $lead_id;
        $this->loadLead();
    }

    public function loadLead()
    {
        $this->lead = Lead::findOrFail($this->lead_id);
        $this->package = $this->lead->package_selected ?? 'business_plus';
        $this->extras = $this->lead->extras_json ?? ['dns' => false, 'hosting' => false, 'seo_profile' => true];
        $this->calculateTotal();
    }

    public function updatedPackage()
    {
        $this->calculateTotal();
    }

    public function updatedExtras()
    {
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        $packages = ['business_plus' => 6780, 'executive_pro' => 13990];
        $base = $packages[$this->package];
        $extras = 0;
        
        if ($this->extras['dns']) $extras += 80;
        if ($this->extras['hosting']) $extras += 1200;
        if ($this->extras['seo_profile']) $extras += 250;
        
        $this->total = $base + $extras;
    }

public function confirmRequirements()
{
    \Log::info('🔥 confirmRequirements START');
    $this->loading = true;
    
    try {
        \Log::info('Loading lead: ' . $this->lead_id);
        $lead = Lead::findOrFail($this->lead_id);
        
        \Log::info('Updating lead with package: ' . $this->package);
        $packages = ['business_plus' => 6780, 'executive_pro' => 13990];
        $extrasCost = ($this->extras['dns'] ? 80 : 0) + 
                      ($this->extras['hosting'] ? 1200 : 0) + 
                      ($this->extras['seo_profile'] ? 250 : 0);
        
        $total = $packages[$this->package] + $extrasCost;
        
        $lead->update([
            'package_selected' => $this->package,
            'extras_json' => $this->extras,
            'total_cost' => $total,
            'status' => 'confirmed'
        ]);
        
        \Log::info('Generating PDF...');
        $service = new RequirementsDocumentService();
        $filename = $service->sendToLead($lead);
        \Log::info('PDF generated: ' . $filename);
        
        $this->loading = false;
        \Log::info('🔥 REDIRECTING to /thankyou/' . $lead->id);
        
        return $this->redirect("/thankyou/{$lead->id}", navigate: true);
        
    } catch (\Exception $e) {
        $this->loading = false;
        \Log::error('❌ ERROR: ' . $e->getMessage());
        \Log::error('❌ TRACE: ' . $e->getTraceAsString());
        throw $e; // Re-throw to see error in console
    }
}



    public function render()
    {
        $packages = [
            'business_plus' => 'Business Plus - R6,780',
            'executive_pro' => 'Executive Pro - R13,990'
        ];

        return view('livewire.public.lead-confirmation', compact('packages'));
    }

    public function testButton()
{
    session()->flash('message', '🔥 LIVEWIRE WORKS! Button clicked.');
    $this->dispatch('alert', message: 'Test successful!');
}

}
