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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('village_name')->default('Desa Tetembomua');
            $table->string('village_head')->default('Abdullah, SP');
            $table->string('term_period')->default('2024 - Sekarang');
            $table->string('district')->default('Lambuya');
            $table->string('regency')->default('Konawe');
            $table->string('province')->default('Sulawesi Tenggara');
            $table->string('area')->default('10.54 km²');
            $table->string('north_boundary')->default('Kecamatan Onembute');
            $table->string('east_boundary')->default('Kecamatan Onembute');
            $table->string('south_boundary')->default('Desa Wonua Hoa dan Asaki');
            $table->string('west_boundary')->default('Desa Amberi');
            $table->text('village_description')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_email')->nullable();
            $table->text('contact_address')->nullable();
            $table->json('social_media')->nullable();
            $table->boolean('website_status')->default(true);
            $table->boolean('maintenance_mode')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
