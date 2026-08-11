<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Contoh: Web Development
            $table->string('icon')->nullable(); // Nama icon / SVG path / class icon
            $table->text('description'); // Deskripsi singkat
            $table->integer('order')->default(0); // Urutan tampilan card
            $table->boolean('is_active')->default(true); // Status aktif/non-aktif
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
