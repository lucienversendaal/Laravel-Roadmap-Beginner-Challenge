<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence();
        $slug = \Illuminate\Support\Str::slug($title);
        return [
            'title' => $title,
            'slug' => $slug,
            'content' => $this->faker->paragraphs(3, true),
            'image_url' => $this->faker->imageUrl(),
            'category_id' => Category::all()->random()->id,
            'tags' => [$this->faker->word(), $this->faker->word(), $this->faker->word()],
            'user_id' => 1,
        ];
    }
}
