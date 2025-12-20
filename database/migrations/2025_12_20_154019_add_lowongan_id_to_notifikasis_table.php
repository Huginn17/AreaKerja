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
        Schema::table('notifikasis', function (Blueprint $table) {
            // tambah kolom lowongan_id (nullable karena data lama)
            $table->unsignedBigInteger('lowongan_id')
                  ->nullable()
                  ->after('pelamar_lowongan_id');

            // foreign key
            $table->foreign('lowongan_id')
                  ->references('id')
                  ->on('lowongan_perusahaans')
                  ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notifikasis', function (Blueprint $table) {
             // drop foreign key dulu
            $table->dropForeign(['lowongan_id']);

            // drop kolom
            $table->dropColumn('lowongan_id');
        });
    }
};
