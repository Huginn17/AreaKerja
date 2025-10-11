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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama_lengkap')->nullable();
            $table->foreignId('provinsi_id')->nullable()->constrained('provinsis')->nullOnDelete();
            $table->foreignId('kota_id')->nullable()->constrained('kotas')->nullOnDelete();
            $table->foreignId('kecamatan_id')->nullable()->constrained('kecamatans')->nullOnDelete();
            $table->string('desa')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('detail_alamat')->nullable();
            $table->string('img_profile')->nullable();
            $table->string('akses_kota')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
