<?php

namespace App\Http\Controllers;

use App\Services\LeadService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request, LeadService $leadService)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'phone'   => 'required|string|max:255',
            'email'   => 'nullable|email|max:255',
            'message' => 'nullable|string',
        ]);

        $lead = $leadService->createFromContactForm($validated);

        return redirect()->route('public.confirm', $lead->public_token);
    }
}

