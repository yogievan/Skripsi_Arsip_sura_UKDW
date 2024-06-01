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
            $table->string('nama');
            $table->string('username')->unique();
            $table->string('email');
            $table->string('password');
            $table->enum('role',['KepalaUnit', 'DosenStaff', 'Sekretariat', 'Admin'])->default('DosenStaff');
            $table->foreignId('id_jabatan');
            $table->foreignId('id_unit');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_unit')->references('id')->on('unit')->onDelete('cascade');
            $table->foreign('id_jabatan')->references('id')->on('jabatan')->onDelete('cascade');
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
