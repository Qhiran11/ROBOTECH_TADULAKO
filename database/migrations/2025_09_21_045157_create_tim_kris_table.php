<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tim_kri', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partisipasi_kri_id')->constrained('partisipasi_kri')->onDelete('cascade');
            $table->string('nama_mahasiswa');
            $table->enum('jenis_tim', ['Inti', 'Support']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tim_kri');
    }
};