<?php

// database/migrations/xxxx_xx_xx_create_aboutpage_sections_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('aboutpage_sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_key')->unique(); // hero, mission, vision, team
            $table->string('heading')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('bg_image')->nullable();
            $table->string('video_url')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aboutpage_sections');
    }
};
