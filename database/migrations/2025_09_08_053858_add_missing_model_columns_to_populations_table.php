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
        Schema::table('populations', function (Blueprint $table) {
            // Align columns used by Model/Import with the database schema
            if (!Schema::hasColumn('populations', 'hubungan_kepala_keluarga')) {
                $table->string('hubungan_kepala_keluarga')->nullable()->after('alamat_kk');
            }
            if (!Schema::hasColumn('populations', 'pendidikan_terakhir')) {
                $table->string('pendidikan_terakhir')->nullable()->after('suku');
            }
            if (!Schema::hasColumn('populations', 'mata_pencaharian')) {
                $table->string('mata_pencaharian')->nullable()->after('pendidikan_terakhir');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('populations', function (Blueprint $table) {
            if (Schema::hasColumn('populations', 'hubungan_kepala_keluarga')) {
                $table->dropColumn('hubungan_kepala_keluarga');
            }
            if (Schema::hasColumn('populations', 'pendidikan_terakhir')) {
                $table->dropColumn('pendidikan_terakhir');
            }
            if (Schema::hasColumn('populations', 'mata_pencaharian')) {
                $table->dropColumn('mata_pencaharian');
            }
        });
    }
};
