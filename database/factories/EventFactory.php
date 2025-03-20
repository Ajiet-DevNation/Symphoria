<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'img' => $this->faker->text,
            'name' => $this->faker->text,
            'description' => $this->faker->text,
            'branch' => $this->faker->text,
            'date' => $this->faker->dateTime,
            'is_registration' => $this->faker->boolean,
            'location' => $this->faker->text,
            'event_type_id' => \App\Models\EventType::factory(),
        ];
    }
}
