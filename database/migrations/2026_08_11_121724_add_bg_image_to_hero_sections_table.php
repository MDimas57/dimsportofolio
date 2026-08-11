<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('hero_sections', function (Blueprint $table) {
            // Menambahkan kolom bg_image setelah profile_image
            $table->string('bg_image')->nullable()->after('profile_image');
        });
    }

    public function down(): void
    {
        Schema::table('hero_sections', function (Blueprint $table) {
            $table->dropColumn('bg_image');
        });
    }
};
