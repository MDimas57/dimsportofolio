<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id();
            $table->string('sub_title')->default('SOFTWARE DEVELOPER');
            $table->string('name');
            $table->text('bio');
            $table->json('highlights')->nullable(); // Poin-poin kecil seperti: Clean Code, Scalable Solutions
            $table->string('cta_primary_text')->default('View My Work');
            $table->string('cta_primary_link')->default('#projects');
            $table->string('cv_file_path')->nullable();
            $table->string('profile_image')->nullable();

            // Floating Card Statistik
            $table->string('experience_years')->nullable()->default('3+');
            $table->string('projects_completed')->nullable()->default('20+');
            $table->string('happy_clients')->nullable()->default('10+');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hero_sections');
    }
};