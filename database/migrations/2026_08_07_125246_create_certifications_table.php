<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('certifications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('issuer')->nullable(); // Penerbit (misal: Dicoding, AWS, Google)
            $table->string('issue_date')->nullable();
            $table->string('front_image'); // Foto Depan Sertifikat
            $table->string('back_image')->nullable(); // Foto Belakang / Transkrip Sertifikat
            $table->text('description')->nullable();
            $table->string('credential_url')->nullable(); // Link Verifikasi Sertifikat
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('certifications');
    }
};
