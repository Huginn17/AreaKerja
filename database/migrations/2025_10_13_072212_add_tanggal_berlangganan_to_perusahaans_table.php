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
        Schema::table('perusahaans', function (Blueprint $table) {
            $table->date('tanggal_berlangganan')->nullable()->after('is_berlangganan');
            $table->date('tanggal_expired')->nullable()->after('tanggal_berlangganan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('perusahaans', function (Blueprint $table) {
            $table->dropColumn(['tanggal_berlangganan', 'tanggal_expired']);
        });
    }
};
