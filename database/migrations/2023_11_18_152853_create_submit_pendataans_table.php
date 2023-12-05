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
        Schema::create('submit_pendataans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendataan_id')->constrained('pendataans')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('restrict')->onUpdate('cascade');
            $table->string('tempat_lahir', 100);
            $table->date('tanggal_lahir');
            $table->string('keperluan');
            $table->string('no_hp_tiongkok', 20);
            $table->string('no_paspor', 20);
            $table->date('masa_berlaku_paspor');
            $table->string('no_visa', 20);
            $table->date('masa_berlaku_visa');
            $table->string('nama_kontak_darurat');
            $table->string('no_kontak_darurat', 20);
            $table->string('hubungan_kontak_darurat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submit_pendataans');
    }
};
