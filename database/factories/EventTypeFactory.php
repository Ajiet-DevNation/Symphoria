<?php

namespace Database\Factories;

use App\Models\EventType;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EventType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->text,
        ];
    }
}
