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
        Schema::table('articles', function (Blueprint $table) {
            $table->string('slug')->default(null)->nullable()->unique()->after('title');
        });

        //create slug for existing articles based on the title with DB statement
        $articles = \App\Models\Article::all();
        foreach ($articles as $article) {
            $article->slug = \Illuminate\Support\Str::slug($article->title);
            $article->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
