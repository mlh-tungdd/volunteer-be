<?php

namespace Database\Factories;

use App\Models\AlbumImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlbumImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AlbumImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $albums = \App\Models\Album::get()->pluck('id')->toArray();
        return [
            'title' => $this->faker->sentence(6, true),
            'thumbnail' => $this->faker->imageUrl($width = 640, $height = 400, 'cats', true, 'Faker', true),
            'album_id' => $this->faker->randomElement($albums),
        ];
    }
}
