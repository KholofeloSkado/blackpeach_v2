<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectIntake extends Model
{
    protected $fillable = [
        'lead_id',
        'needs_professional_email_setup',
        'email_accounts_needed',
        'is_decision_maker',
        'operating_status',
        'has_paying_customers',
        'budget_range',
        'payment_readiness',
        'primary_goal',
    ];


    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }
}
