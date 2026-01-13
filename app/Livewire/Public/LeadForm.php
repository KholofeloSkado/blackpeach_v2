<?php

namespace App\Livewire\Public;

use Livewire\Component;
use App\Models\Lead;

class LeadForm extends Component
{
    public $name;
    public $phone;
    public $email;
    public $business_name;
    public $current_website;
    public $package = 'business_plus';
    public $extras = [
        'dns' => false,
        'hosting' => false, 
        'seo_profile' => true,
    ];
    public $formSubmitted = false;
    public $reference_number;

    protected $rules = [
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'email' => 'nullable|email|max:255',
        'business_name' => 'nullable|string|max:255',
        'current_website' => 'nullable|url|max:255',
    ];

    public function submit()
    {
        $this->validate();

        $packages = ['business_plus' => 6780, 'executive_pro' => 13990];
        $extrasCost = ($this->extras['dns'] ? 80 : 0) + 
                    ($this->extras['hosting'] ? 1200 : 0) + 
                    ($this->extras['seo_profile'] ? 250 : 0);
        
        $total = $packages[$this->package] + $extrasCost;

        $lead = \App\Models\Lead::create([
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email ?? null,
            'business_name' => $this->business_name ?? null,
            'current_website' => $this->current_website ?? null,
            'package_selected' => $this->package,
            'extras_json' => $this->extras,
            'total_cost' => $total,
            'status' => 'new',
            'source' => 'website'
        ]);

        $this->reference_number = 'SH-' . str_pad($lead->id, 6, '0', STR_PAD_LEFT);
        $this->formSubmitted = true;

        // REDIRECT TO CONFIRMATION INSTEAD OF SUCCESS
        return redirect()->to("/confirm/{$lead->id}");
    }
}
