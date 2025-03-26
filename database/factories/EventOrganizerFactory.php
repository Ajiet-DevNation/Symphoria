<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\EventOrganizer;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventOrganizerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EventOrganizer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->text,
            'name' => $this->faker->text,
            'position' => $this->faker->text,
            'phone' => $this->faker->text,
            'img' => $this->faker->text,
            'event_id' => \App\Models\Event::factory(),
        ];
    }
}
