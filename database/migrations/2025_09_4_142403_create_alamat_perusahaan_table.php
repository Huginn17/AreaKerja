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
        Schema::create('alamat_perusahaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perusahaan_id')->constrained('perusahaans')->cascadeOnDelete();
            $table->foreignId('provinsi_id')->nullable()->constrained('provinsis')->nullOnDelete();
            $table->foreignId('kota_id')->nullable()->constrained('kotas')->nullOnDelete();
            $table->foreignId('kecamatan_id')->nullable()->constrained('kecamatans')->nullOnDelete();
            $table->string('desa')->nullable();
            $table->string('kode_pos')->nullable();
            $table->text('detail')->nullable();
            $table->string('label')->nullable();
            $table->boolean('utama')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alamat_perusahaan');
    }
};
