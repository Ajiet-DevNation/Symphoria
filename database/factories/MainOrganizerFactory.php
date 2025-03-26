<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\MainOrganizer;
use Illuminate\Database\Eloquent\Factories\Factory;

class MainOrganizerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MainOrganizer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text,
            'img' => $this->faker->text,
            'position' => $this->faker->text,
            'email' => $this->faker->text,
            'phone' => $this->faker->text,
        ];
    }
}
