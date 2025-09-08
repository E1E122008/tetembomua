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
            // Field yang belum ada di migrasi sebelumnya
            $table->date('kk_dikeluarkan')->nullable()->after('no_kk');
            $table->string('bulan_lahir')->nullable()->after('tanggal_lahir');
            $table->string('tahun_lahir')->nullable()->after('bulan_lahir');
            $table->string('pekerjaan_tambahan')->nullable()->after('pekerjaan');
            $table->integer('ikan')->default(0)->after('ayam');
            $table->string('penggunaan_listrik')->nullable()->after('status_lantai');
            $table->string('mck')->nullable()->after('penggunaan_listrik');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('populations', function (Blueprint $table) {
            $table->dropColumn([
                'kk_dikeluarkan',
                'bulan_lahir', 
                'tahun_lahir',
                'pekerjaan_tambahan',
                'ikan',
                'penggunaan_listrik',
                'mck'
            ]);
        });
    }
};
