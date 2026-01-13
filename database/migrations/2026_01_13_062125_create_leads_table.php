<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Table already exists - SKIP creation
        if (Schema::hasTable('leads')) {
            // Fix index length issue
            DB::statement('ALTER TABLE leads DROP INDEX IF EXISTS leads_status_created_at_index');
            DB::statement('ALTER TABLE leads ADD INDEX leads_status_created_at_index(status(50), created_at)');
            return;
        }
        
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('business_name')->nullable();
            $table->string('current_website')->nullable();
            $table->string('package_selected')->default('business_plus');
            $table->json('extras_json');
            $table->decimal('total_cost', 10, 2);
            $table->string('status')->default('new');
            $table->string('source')->default('website');
            $table->timestamps();
            
            // FIXED: Prefix index (50 chars max)
            $table->index('status(50)', 'status_index');
            $table->index(['status(50)', 'created_at'], 'leads_status_created_at_index');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
