<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $db = DB::connection('mysql2')->getDatabaseName();
            $table->id();
            $table->string('type',100);
            $table->string('title', 100);
            $table->string('slug')->nullable();
            $table->string('extract')->nullable();
            $table->string('url')->nullable();
            $table->string('image_author')->nullable();
            $table->longText('body')->nullable();
            $table->enum('status', [1, 2, 3, 4, 5])->default(1);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');

            $table->foreign('user_id')->references('id')->on(new Expression($db . '.users'))->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
