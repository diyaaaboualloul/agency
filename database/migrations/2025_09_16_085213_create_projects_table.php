<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            // Relation: each project belongs to one service
            $table->foreignId('service_id')
                  ->constrained()
                  ->cascadeOnDelete();

            // Basic fields
            $table->string('title');
            $table->string('slug')->unique();         // we'll fill this automatically later
            $table->string('cover_image')->nullable(); // stored on "public" disk like services
            $table->text('summary')->nullable();       // short teaser
            $table->longText('description')->nullable(); // detailed body

            // Optional metadata (handy on portfolio pages)
            $table->string('client')->nullable();
            $table->string('location')->nullable();
            $table->date('completed_at')->nullable();

            $table->boolean('is_published')->default(true);

            $table->timestamps();

            $table->index(['service_id', 'is_published']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
