<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_sections', function (Blueprint $table) {
            $table->id();
            $table->string('badge')->default('ABOUT ME');
            $table->string('title')->default('Crafting Digital Experiences with Code');
            $table->text('description'); // Cukup 1 kolom deskripsi

            // Detail Info Box
            $table->string('name')->nullable();
            $table->string('location')->nullable();
            $table->string('email')->nullable();
            $table->string('availability_status')->default('Open to Work');

            // Media & Links
            $table->string('image')->nullable();
            $table->string('button_text')->default('More About Me');
            $table->string('button_link')->default('#about');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_sections');
    }
};
