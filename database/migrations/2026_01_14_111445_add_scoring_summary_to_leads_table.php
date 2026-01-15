<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            if (!Schema::hasColumn('leads', 'lead_score')) {
                $table->unsignedInteger('lead_score')->default(0)->after('status');
            }

            if (!Schema::hasColumn('leads', 'recommendation')) {
                $table->string('recommendation')->nullable()->after('lead_score'); // proceed|caution|decline
            }

            if (!Schema::hasColumn('leads', 'flags')) {
                $table->json('flags')->nullable()->after('recommendation'); // json array of string codes
            }
        });
    }

    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            if (Schema::hasColumn('leads', 'flags')) $table->dropColumn('flags');
            if (Schema::hasColumn('leads', 'recommendation')) $table->dropColumn('recommendation');
            if (Schema::hasColumn('leads', 'lead_score')) $table->dropColumn('lead_score');
        });
    }
};
