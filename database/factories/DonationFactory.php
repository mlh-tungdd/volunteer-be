<?php

namespace Database\Factories;

use App\Models\Donation;
use Illuminate\Database\Eloquent\Factories\Factory;

class DonationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Donation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = \App\Models\User::get()->pluck('id')->toArray();
        return [
            'title' => $this->faker->sentence(3, true),
            'description' => $this->faker->text(200),
            'content' => $this->faker->text(200),
            'status' => 1,
            'tags' => '',
            'user_id' => $this->faker->randomElement($users),
        ];
    }
}
