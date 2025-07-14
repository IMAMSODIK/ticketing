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
        Schema::create('events', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('thumbnail')->nullable();
            $table->string('title');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->foreignId('kota_id');
            $table->string('nama_tempat');
            $table->string('koordinat_lokasi')->nullable();
            $table->text('alamat');
            $table->longText('deskripsi');
            $table->foreignId('created_by');
            $table->foreignId('updated_by');
            $table->string('status')->default('Aktif');
            $table->foreignId('jenis_tiket_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
