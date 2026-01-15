<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('project_intakes', function (Blueprint $table) {
            $table->id();

            // Each lead has exactly one intake
            $table->foreignId('lead_id')
                ->constrained('leads')
                ->cascadeOnDelete()
                ->unique();

            // Scope awareness (not scoring)
            $table->boolean('needs_professional_email_setup')->default(false);
            $table->unsignedTinyInteger('email_accounts_needed')->nullable();

            // Qualification / viability
            $table->boolean('is_decision_maker')->nullable();
            $table->string('operating_status')->nullable();      // yes|pre-launch|no
            $table->boolean('has_paying_customers')->nullable();
            $table->string('budget_range')->nullable();          // under_5k|5_8k|8_15k|15k_plus
            $table->string('payment_readiness')->nullable();     // allocated|owner_funded|website_must_generate_money
            $table->string('primary_goal')->nullable();          // credibility|leads|bookings|ecommerce|not_sure

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_intakes');
    }
};
