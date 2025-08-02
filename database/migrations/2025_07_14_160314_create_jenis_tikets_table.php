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
        Schema::create('jenis_tikets', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nama');
            $table->decimal('harga', 10, 2);
            $table->bigInteger('kuota')->default(0);
            $table->bigInteger('terjual')->default(0);
            $table->text('deskripsi')->nullable();
            $table->boolean('status')->default(1);
            $table->uuid('event_id');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_tikets');
    }
};
