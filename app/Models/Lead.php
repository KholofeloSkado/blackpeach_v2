<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    // ✅ ADD THIS LINE - FIXES ERROR
    protected $fillable = [
        'name',
        'phone', 
        'email',
        'business_name',
        'current_website',
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
}
