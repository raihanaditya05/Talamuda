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
        Schema::create('progres_proyek', function (Blueprint $table) {
             $table->id();
    $table->string('nama_proyek');
    $table->text('deskripsi')->nullable();
    $table->integer('persentase')->default(0);
    $table->date('tanggal_mulai');
    $table->date('tanggal_selesai')->nullable();
    $table->string('foto')->nullable(); 
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progres_proyek');
    }
};
