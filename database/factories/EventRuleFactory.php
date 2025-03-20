<?php

namespace Database\Factories;

use App\Models\EventRule;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventRuleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EventRule::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->text,
            'event_id' => \App\Models\Event::factory(),
        ];
    }
}
