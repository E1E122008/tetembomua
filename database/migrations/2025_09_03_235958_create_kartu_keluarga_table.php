<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kartu_keluarga', function (Blueprint $table) {
            $table->id();
            
            // Nomor KK
            $table->string('no_kk', 20)->unique();
            
            // Alamat Lengkap
            $table->text('alamat');
            $table->string('rt', 3)->nullable();
            $table->string('rw', 3)->nullable();
            $table->string('dusun')->nullable();
            $table->string('desa');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('provinsi');
            $table->string('kode_pos', 5)->nullable();
            
            // Data KK
            $table->date('tanggal_dikeluarkan');
            $table->string('kepala_keluarga');
            
            $table->timestamps();
            
            // Indexes
            $table->index('no_kk');
            $table->index(['desa', 'kecamatan', 'kabupaten']);
            $table->index('tanggal_dikeluarkan');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kartu_keluarga');
    }
};