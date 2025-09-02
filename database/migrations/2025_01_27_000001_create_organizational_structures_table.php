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
        Schema::create('organizational_structures', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position');
            $table->enum('role_type', ['kepala_desa', 'perangkat', 'bpd', 'lpm', 'dusun', 'rt', 'lainnya']);
            $table->string('role_text')->nullable(); // Untuk RT 1, Dusun 1, dll
            $table->text('info')->nullable(); // Masa jabatan, pendidikan, dll
            $table->string('photo_path')->nullable();
            $table->string('term_period')->default('2024 - Sekarang');
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            
            // Indexes
            $table->index(['role_type', 'is_active']);
            $table->index('sort_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizational_structures');
    }
};
