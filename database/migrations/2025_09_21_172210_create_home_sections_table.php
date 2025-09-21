<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('home_sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_key')->unique(); // e.g. hero, services_intro, stats, projects_grid, process
            $table->string('title')->nullable();     // small label / eyebrow
            $table->string('heading')->nullable();   // main heading
            $table->string('subtitle')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();       // main image
            $table->string('bg_image')->nullable();    // background image if any
            $table->string('video_url')->nullable();   // optional
            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();
            $table->json('stats')->nullable();         // e.g. [{"label":"Years","value":"15+"}, ...]
            $table->json('extra')->nullable();         // anything custom per section
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_sections');
    }
};
