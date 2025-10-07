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
        Schema::create('pembeli_kandidats', function (Blueprint $table) {
            $table->id();
            $table->string('no_referensi')->unique();
            $table->foreignId('pelamar_id')->constrained('pelamars')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('lowongan_perusahaan_id')->constrained('lowongan_perusahaans')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('status', ['pending', 'diterima', 'ditolak'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembeli_kandidats');
    }
};
