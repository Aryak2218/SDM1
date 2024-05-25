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
        Schema::create('postxes', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelatihan');
            $table->string('tanggal_pelatihan');
            $table->text('lokasi_pelatihan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postxes');
    }
};
