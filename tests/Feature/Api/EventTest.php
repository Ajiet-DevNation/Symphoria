<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Event;

use App\Models\EventType;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_events_list()
    {
        $events = Event::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.events.index'));

        $response->assertOk()->assertSee($events[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_event()
    {
        $data = Event::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.events.store'), $data);

        $this->assertDatabaseHas('events', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_event()
    {
        $event = Event::factory()->create();

        $eventType = EventType::factory()->create();

        $data = [
            'img' => $this->faker->text,
            'name' => $this->faker->text,
            'description' => $this->faker->text,
            'branch' => $this->faker->text,
            'date' => $this->faker->dateTime,
            'is_registration' => $this->faker->boolean,
            'location' => $this->faker->text,
            'event_type_id' => $eventType->id,
        ];

        $response = $this->putJson(route('api.events.update', $event), $data);

        $data['id'] = $event->id;

        $this->assertDatabaseHas('events', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_event()
    {
        $event = Event::factory()->create();

        $response = $this->deleteJson(route('api.events.destroy', $event));

        $this->assertModelMissing($event);

        $response->assertNoContent();
    }
}
