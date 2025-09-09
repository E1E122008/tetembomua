<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penduduk', function (Blueprint $table) {
            $table->id();
            
            // Identitas Dasar
            $table->string('nama');
            $table->string('nik', 16)->unique();
            $table->string('no_kk', 20);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('hubungan_kepala_keluarga');
            
            // Alamat dan KK
            $table->text('alamat_kartu_keluarga');
            $table->date('tanggal_kk_dikeluarkan');
            
            // Data Kelahiran
            $table->string('tempat_lahir');
            $table->integer('tanggal_lahir');
            $table->integer('bulan_lahir');
            $table->integer('tahun_lahir');
            
            // Status dan Demografi
            $table->string('status_perkawinan');
            $table->string('suku');
            $table->string('pendidikan_terakhir');
            
            // Pekerjaan
            $table->string('mata_pencaharian');
            $table->string('pekerjaan_tambahan')->nullable();
            
            // Kendaraan
            $table->boolean('kendaraan_mobil')->default(false);
            $table->boolean('kendaraan_motor')->default(false);
            $table->boolean('kendaraan_sepeda')->default(false);
            
            // Ternak
            $table->integer('ternak_sapi')->default(0);
            $table->integer('ternak_kambing')->default(0);
            $table->integer('ternak_ayam')->default(0);
            $table->integer('ternak_ikan')->default(0);
            
            // Lahan
            $table->decimal('luas_lahan_pertanian', 10, 2)->default(0);
            $table->decimal('luas_lahan_peternakan', 10, 2)->default(0);
            
            // Komoditas
            $table->string('komoditas_utama')->nullable();
            $table->string('komoditas_buah_sayur')->nullable();
            
            // Bantuan dan Kepemilikan
            $table->boolean('status_bantuan')->default(false);
            $table->string('kepemilikan')->nullable();
            
            // Status Rumah
            $table->string('status_rumah_dinding')->nullable();
            $table->string('status_rumah_atap')->nullable();
            $table->string('status_rumah_listrik')->nullable();
            $table->string('status_rumah_mck')->nullable();
            
            // Relasi - TIDAK ADA FOREIGN KEY SAAT INI
            // $table->foreignId('kartu_keluarga_id')->nullable()->constrained('kartu_keluarga')->onDelete('set null');
            
            $table->timestamps();
            
            // Indexes
            $table->index(['nama', 'nik']);
            $table->index('no_kk');
            $table->index('jenis_kelamin');
            $table->index(['tahun_lahir', 'bulan_lahir', 'tanggal_lahir']);
            $table->index('tanggal_kk_dikeluarkan');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penduduk');
    }
};