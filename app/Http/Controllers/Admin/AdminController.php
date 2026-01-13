<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __invoke(Request $request)
    {
        $stats = [
            'total_leads' => \App\Models\Lead::count(),
            'new_leads' => \App\Models\Lead::where('status', 'new')->count(),
            'confirmed' => \App\Models\Lead::whereIn('status', ['confirmed', 'requirements_sent'])->count(),
        ];
        return view('admin.dashboard', compact('stats'));
    }
}
