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
        Schema::create('disposisi_surat_masuk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_sifat_surat');
            $table->foreignId('id_surat_masuk');
            $table->string('pengirim')->nullable();
            $table->string('penerima')->nullable();
            $table->longText('catatan')->nullable();
            $table->string('lampiran_1')->nullable();
            $table->string('lampiran_2')->nullable();
            $table->string('lampiran_3')->nullable();
            $table->string('status_disposisi')->nullable();
            $table->timestamps();

            $table->foreign('id_sifat_surat')->references('id')->on('sifat_surat')->onDelete('cascade');
            $table->foreign('id_surat_masuk')->references('id')->on('surat_masuk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disposisi_surat_masuk');
    }
};
