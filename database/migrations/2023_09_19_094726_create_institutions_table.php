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
        Schema::create('institutions', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->nullable();
            $table->string('address', 1000)->nullable();
            $table->string('logo', 150)->nullable();
            $table->text('about')->nullable();
            $table->string('contacts', 500)->nullable();
            $table->text('social')->nullable(); //json
            $table->text('privacy')->nullable();
            $table->text('terms')->nullable();
            $table->boolean('visible_apps')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institutions');
    }
};
