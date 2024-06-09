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
        Schema::create('surat_keluar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kategori_surat');
            $table->foreignId('id_unit');
            $table->string('kode_surat');
            $table->string('pengirim')->nullable();
            $table->string('penerima')->nullable();
            $table->bigInteger('unit_penerima')->nullable();
            $table->string('subjek');
            $table->longText('catatan')->nullable();
            $table->string('lampiran_1')->nullable();
            $table->string('lampiran_2')->nullable();
            $table->string('lampiran_3')->nullable();
            $table->string('status_surat')->nullable();
            $table->timestamps();

            $table->foreign('id_kategori_surat')->references('id')->on('kategori_surat')->onDelete('cascade');
            $table->foreign('id_unit')->references('id')->on('unit')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_keluar');
    }
};
