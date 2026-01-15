<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // 1) Add columns (additive only)
        Schema::table('project_intakes', function (Blueprint $table) {
            if (!Schema::hasColumn('project_intakes', 'lead_id')) {
                $table->unsignedBigInteger('lead_id')->nullable()->after('id');
            }

            if (!Schema::hasColumn('project_intakes', 'needs_professional_email_setup')) {
                $table->boolean('needs_professional_email_setup')->default(false);
            }

            if (!Schema::hasColumn('project_intakes', 'email_accounts_needed')) {
                $table->unsignedTinyInteger('email_accounts_needed')->nullable();
            }

            if (!Schema::hasColumn('project_intakes', 'is_decision_maker')) {
                $table->boolean('is_decision_maker')->nullable();
            }

            if (!Schema::hasColumn('project_intakes', 'operating_status')) {
                $table->string('operating_status')->nullable(); // yes|pre-launch|no
            }

            if (!Schema::hasColumn('project_intakes', 'has_paying_customers')) {
                $table->boolean('has_paying_customers')->nullable();
            }

            if (!Schema::hasColumn('project_intakes', 'budget_range')) {
                $table->string('budget_range')->nullable(); // under_5k|5_8k|8_15k|15k_plus
            }

            if (!Schema::hasColumn('project_intakes', 'payment_readiness')) {
                $table->string('payment_readiness')->nullable(); // allocated|owner_funded|website_must_generate_money
            }

            if (!Schema::hasColumn('project_intakes', 'primary_goal')) {
                $table->string('primary_goal')->nullable(); // credibility|leads|bookings|ecommerce|not_sure
            }
        });

        // 2) Add constraints AFTER column exists
        Schema::table('project_intakes', function (Blueprint $table) {
            // Unique: 1 intake per lead
            // (If this fails due to existing duplicate rows, we'll clean them first—unlikely given empty table.)
            if (Schema::hasColumn('project_intakes', 'lead_id')) {
                try {
                    $table->unique('lead_id', 'project_intakes_lead_id_unique');
                } catch (\Throwable $e) {
                    // ignore if exists
                }

                try {
                    $table->foreign('lead_id', 'project_intakes_lead_id_fk')
                        ->references('id')->on('leads')
                        ->cascadeOnDelete();
                } catch (\Throwable $e) {
                    // ignore if exists
                }
            }
        });
    }

    public function down(): void
    {
        // down may drop
        Schema::table('project_intakes', function (Blueprint $table) {
            // Drop FK/unique first (names used above)
            try { $table->dropForeign('project_intakes_lead_id_fk'); } catch (\Throwable $e) {}
            try { $table->dropUnique('project_intakes_lead_id_unique'); } catch (\Throwable $e) {}

            foreach ([
                'primary_goal',
                'payment_readiness',
                'budget_range',
                'has_paying_customers',
                'operating_status',
                'is_decision_maker',
                'email_accounts_needed',
                'needs_professional_email_setup',
                'lead_id',
            ] as $col) {
                if (Schema::hasColumn('project_intakes', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};
