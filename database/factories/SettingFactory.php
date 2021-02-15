<?php

namespace Database\Factories;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Setting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->text(200),
            'content' => $this->faker->text(200),
            'favicon' => 'https://fakeimg.pl/700x400/?text=' . $this->faker->word,
            'logo' => 'https://fakeimg.pl/700x400/?text=' . $this->faker->word,
            'address' => $this->faker->address,
            'hotline' => $this->faker->phoneNumber,
            'email' => $this->faker->email
        ];
    }
}
