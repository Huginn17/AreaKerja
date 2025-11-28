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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default('buka'); // Status event
            $table->string('title'); // Nama event
            $table->integer('kuota')->nullable(); // Kuota partisipasi
            $table->string('image')->nullable(); // Banner atau gambar event
            $table->mediumText('content')->nullable(); // Deskripsi acara
            $table->date('tgl_mulai');
            $table->string('jam_mulai', 5);
            $table->date('tgl_akhir');
            $table->string('jam_akhir', 5);
            $table->text('lokasi')->nullable(); // Lokasi event
            $table->string('link_form')->nullable(); // Link pendaftaran
            $table->date('penutupan_pendaftaran')->nullable(); // Batas akhir daftar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
