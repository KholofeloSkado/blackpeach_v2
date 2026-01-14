<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Allow contact-only leads (no quote data yet)
        DB::statement("ALTER TABLE leads MODIFY extras_json JSON NULL");
        
        // These are *likely* also quote-related; make them nullable too
        // (If any of these columns don't exist in your DB, comment that line out.)
        DB::statement("ALTER TABLE leads MODIFY package_selected VARCHAR(255) NULL");
        DB::statement("ALTER TABLE leads MODIFY total_cost INT NULL");
    }

    public function down(): void
    {
        // Revert to required fields (only if you want the old behavior back)
        DB::statement("ALTER TABLE leads MODIFY extras_json JSON NOT NULL");
        DB::statement("ALTER TABLE leads MODIFY package_selected VARCHAR(255) NOT NULL");
        DB::statement("ALTER TABLE leads MODIFY total_cost INT NOT NULL");
    }
};
