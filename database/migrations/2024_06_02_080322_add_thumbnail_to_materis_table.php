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
        Schema::table('materis', function (Blueprint $table) {
            $table->string('thumbnail')->nullable()->after('kategori');
            $table->text('konten')->nullable()->after('thumbnail');
            $table->string('slug')->nullable()->after('nama');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('materis', function (Blueprint $table) {
            $table->dropColumn('thumbnail');
            $table->dropColumn('konten');
            $table->dropColumn('slug');
        });
    }
};
