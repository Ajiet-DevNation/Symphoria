<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uid' => $this->faker->text(255),
            'name' => $this->faker->text,
            'email' => $this->faker->text(10),
            'email_verified_at' => now(),
            'password' => \Hash::make('password'),
            'remember_token' => $this->faker->text,
            'phone' => $this->faker->text,
            'usn' => $this->faker->text,
            'is_paid' => $this->faker->boolean,
            'payment_screenshot' => $this->faker->text,
            'transaction_id' => $this->faker->text,
            'college_name' => $this->faker->text,
            'pass_type' => 'base',
            'id_card' => $this->faker->text,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
