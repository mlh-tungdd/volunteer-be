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
        $categoriesNews = \App\Models\CategoryNews::get()->pluck('id')->toArray();
        return [
            'title' => $this->faker->sentence(6, true),
            'description' => $this->faker->text(200),
            'content' => $this->faker->text(200),
            'thumbnail' => $this->faker->imageUrl($width = 640, $height = 400, 'cats', true, 'Faker', true),
            'author' => $this->faker->name,
            'source' => $this->faker->company,
            'views' => $this->faker->numberBetween(0, 100),
            'category_id' => $this->faker->randomElement($categoriesNews),
        ];
    }
}
