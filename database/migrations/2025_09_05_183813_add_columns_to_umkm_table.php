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
        Schema::table('umkm', function (Blueprint $table) {
            if (!Schema::hasColumn('umkm', 'nama')) {
                $table->string('nama')->after('id');
            }
            if (!Schema::hasColumn('umkm', 'jenis')) {
                $table->string('jenis')->after('nama');
            }
            if (!Schema::hasColumn('umkm', 'jumlah')) {
                $table->integer('jumlah')->default(0)->after('jenis');
            }
            if (!Schema::hasColumn('umkm', 'deskripsi')) {
                $table->text('deskripsi')->nullable()->after('jumlah');
            }
            if (!Schema::hasColumn('umkm', 'alamat')) {
                $table->string('alamat')->nullable()->after('deskripsi');
            }
            if (!Schema::hasColumn('umkm', 'pemilik')) {
                $table->string('pemilik')->nullable()->after('alamat');
            }
            if (!Schema::hasColumn('umkm', 'aktif')) {
                $table->boolean('aktif')->default(true)->after('pemilik');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('umkm', function (Blueprint $table) {
            $table->dropColumn(['nama', 'jenis', 'jumlah', 'deskripsi', 'alamat', 'pemilik', 'aktif']);
        });
    }
};
