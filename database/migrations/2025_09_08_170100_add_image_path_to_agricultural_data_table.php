<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('agricultural_data') && !Schema::hasColumn('agricultural_data', 'image_path')) {
            Schema::table('agricultural_data', function (Blueprint $table) {
                $table->string('image_path')->nullable()->after('harvest_season');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('agricultural_data') && Schema::hasColumn('agricultural_data', 'image_path')) {
            Schema::table('agricultural_data', function (Blueprint $table) {
                $table->dropColumn('image_path');
            });
        }
    }
};


