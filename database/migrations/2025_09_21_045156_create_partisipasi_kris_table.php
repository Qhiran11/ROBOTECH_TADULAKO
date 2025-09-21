<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('partisipasi_kri', function (Blueprint $table) {
            $table->id();
            $table->foreignId('divisi_id')->constrained('divisis')->onDelete('cascade');
            $table->year('tahun');
            $table->string('nama_tim'); // e.g., Nanopa
            $table->string('tema_lomba');
            $table->string('pembimbing');
            $table->string('lokasi_pertandingan');
            $table->string('foto_robot')->nullable();
            $table->string('file_rulebook')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partisipasi_kri');
    }
};


