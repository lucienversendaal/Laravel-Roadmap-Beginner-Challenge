<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default(null)->nullable();
            $table->text('content')->default(null)->nullable();
            $table->string('image_url')->default(null)->nullable();
            $table->json('tags')->default(null)->nullable();
            $table->foreignIdFor(\App\Models\Category::class)->nullable();
            $table->foreignIdFor(\App\Models\User::class)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
