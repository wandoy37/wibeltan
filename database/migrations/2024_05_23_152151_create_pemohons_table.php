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
        Schema::create('pemohons', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('asal');
            $table->string('no_hp', 90);
            $table->string('email', 90);
            $table->string('count_peserta', 50);
            $table->string('count_gazebo', 50);
            $table->string('tanggal_pelaksanaan', 90);
            $table->enum('verifikasi', ['disetujui', 'menunggu persetujuan', 'ditolak']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemohons');
    }
};
