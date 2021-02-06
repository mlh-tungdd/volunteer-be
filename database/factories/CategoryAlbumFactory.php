<?php

namespace Database\Factories;

use App\Models\CategoryAlbum;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryAlbumFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoryAlbum::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(6, true),
        ];
    }
}
