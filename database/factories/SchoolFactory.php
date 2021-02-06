<?php

namespace Database\Factories;

use App\Models\School;
use Illuminate\Database\Eloquent\Factories\Factory;

class SchoolFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = School::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(6, true),
            'description' => $this->faker->text(200),
            'content' => $this->faker->text(200),
            'address' => $this->faker->address,
            'views' => $this->faker->numberBetween(0, 100),
        ];
    }
}
