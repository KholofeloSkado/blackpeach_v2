@extends('admin.layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
    <div class="bg-white p-8 rounded-2xl shadow-xl border-l-4 border-green-500">
        <div class="flex items-center">
            <div class="p-3 bg-green-100 rounded-xl mr-4">
                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
            </div>
            <div>
                <p class="text-gray-600 text-sm">Total Leads</p>
                <p class="text-3xl font-bold text-gray-900">{{ $stats['total_leads'] }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white p-8 rounded-2xl shadow-xl border-l-4 border-blue-500">
        <div class="flex items-center">
            <div class="p-3 bg-blue-100 rounded-xl mr-4">
                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.27 7.27c.883.883 2.317.883 3.2 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </div>
            <div>
                <p class="text-gray-600 text-sm">New Leads</p>
                <p class="text-3xl font-bold text-gray-900">{{ $stats['new_leads'] }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white p-8 rounded-2xl shadow-xl border-l-4 border-yellow-500">
        <div class="flex items-center">
            <div class="p-3 bg-yellow-100 rounded-xl mr-4">
                <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div>
                <p class="text-gray-600 text-sm">Confirmed</p>
                <p class="text-3xl font-bold text-gray-900">{{ $stats['confirmed'] }}</p>
            </div>
        </div>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-xl p-8">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Recent Leads</h2>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="bg-gray-50">
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Reference</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Created</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach(\App\Models\Lead::latest()->limit(5)->get() as $lead)
                <tr>
                    <td class="px-6 py-4 font-mono text-blue-600">{{ $lead->reference_number }}</td>
                    <td class="px-6 py-4">{{ $lead->name }}</td>
                    <td class="px-6 py-4">
                        @if($lead->status == 'new')
                            <span class="px-3 py-1 bg-orange-100 text-orange-800 rounded-full text-sm">New</span>
                        @elseif($lead->status == 'confirmed')
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm">Confirmed</span>
                        @else
                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">Sent</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $lead->created_at->diffForHumans() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-6">
        <a href="{{ route('admin.leads.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl transition">
            View All Leads →
        </a>
    </div>
</div>
@endsection
