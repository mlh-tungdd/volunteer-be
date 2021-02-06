<?php

namespace Database\Factories;

use App\Models\Album;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlbumFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Album::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categoriesAlbum = \App\Models\CategoryAlbum::get()->pluck('id')->toArray();
        return [
            'title' => $this->faker->sentence(6, true),
            'description' => $this->faker->text(200),
            'content' => $this->faker->text(200),
            'category_album_id' => $this->faker->randomElement($categoriesAlbum),
        ];
    }
}
