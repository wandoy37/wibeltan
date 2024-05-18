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
        Schema::table('pemohons', function (Blueprint $table) {
            $table->enum('verifikasi', ['disetujui', 'menunggu persetujuan', 'terlaksana'])->after('tanggal_pelaksanaan')->default('menunggu persetujuan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pemohons', function (Blueprint $table) {
            $table->dropColumn('alamat');
        });
    }
};
