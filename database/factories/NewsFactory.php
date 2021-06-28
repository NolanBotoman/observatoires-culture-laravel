<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->words($nb = 3, $asText = true)),
            'content' => $this->faker->paragraphs($nb = 3, $asText = true),
            'publish_at' => now(),
            'user_id' => 1
        ];
    }
}
