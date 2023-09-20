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
        Schema::create('carrusels', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->boolean('visible')->default(true);
            $table->string('description', 1500)->nullable();
            $table->string('title_button', 50)->nullable();
            $table->string('color_button', 100)->nullable();
            $table->string('url_button', 1000)->nullable();
            $table->string('position', 50)->nullable();
            $table->string('url_image', 500)->nullable();
            $table->integer('status')->nullable();
            $table->string('type', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrusels');
    }
};
