<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = \App\Models\User::get()->pluck('id')->toArray();
        return [
            'content' => $this->faker->text(200),
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'fullname' => $this->faker->name,
            'user_id' => $this->faker->randomElement($users),
        ];
    }
}
