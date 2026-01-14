<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Lead extends Model
{
    use HasFactory;

    // ✅ ADD THIS LINE - FIXES ERROR
    protected $fillable = [
        'public_token',
        'name',
        'phone', 
        'email',
        'business_name',
        'current_website',
        'message',
        'package_selected',
        'extras_json',
        'total_cost',
        'status',
        'source'
    ];

    protected $casts = [
        'extras_json' => 'array',
        'total_cost' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


    protected static function booted()
    {
        static::creating(function ($lead) {
            if (empty($lead->public_token)) {
                $lead->public_token = (string) Str::uuid();
            }

            // Optional safety defaults (won’t override if set)
            $lead->status ??= 'new';
            $lead->source ??= 'website';
        });
    }
}


