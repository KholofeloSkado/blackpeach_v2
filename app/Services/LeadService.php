<?php
namespace App\Services;

use App\Models\Lead;
use Illuminate\Support\Str;

class LeadService
{
    public function createFromContactForm(array $data): Lead
    {
        return Lead::create([
            'public_token'    => Str::uuid(),
            
            'name'            => $data['name'],
            'phone'           => $data['phone'],
            'email'           => $data['email'] ?? null,
            'business_name'   => $data['business_name'] ?? null,   // in case you add it later
            'current_website' => $data['current_website'] ?? null, // in case you add it later
            'message'         => $data['message'] ?? null,


            'status'          => 'new',
            'source'          => 'contact_form',
            'package_selected'=> 'business_plus',
            'extras_json'     => [],
            'total_cost'      => 0,
        ]);
    }
}
