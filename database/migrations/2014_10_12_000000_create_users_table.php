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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ranting_id')->constrained('rantings')->onDelete('restrict')->onUpdate('cascade');
            $table->string('nik', 20)->unique();
            $table->string('nama', 100);
            $table->string('email')->unique();
            $table->string('no_hp', 20)->unique();
            $table->string('password');
            $table->enum('gender', ['laki-laki', 'perempuan'])->default('laki-laki');
            $table->text('alamat_indonesia')->nullable();
            $table->text('alamat_tingkok')->nullable();
            $table->string('foto')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
