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
        Schema::create('catatan_cashs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('harga_pembayaran_id')->nullable()->constrained('harga_pembayarans')->onDelete('set null');
            $table->foreignId('daftar_bank_id')->nullable()->constrained('daftar_bank')->onDelete('set null');
            $table->string('no_referensi')->nullable();
            $table->string('pesanan')->nullable();
            $table->string('dari')->nullable();
            $table->string('sumberDana')->nullable();
            $table->integer('total')->nullable();
            $table->enum('status', ['pending', 'menunggu_verifikasi','expired', 'diterima', 'ditolak'])->default('pending');
            $table->string('bukti')->nullable();
            $table->timestamp('expired_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catatan_cashs');
    }
};
