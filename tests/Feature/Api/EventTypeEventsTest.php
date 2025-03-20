<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Event;
use App\Models\EventType;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventTypeEventsTest extends TestCase
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
    public function it_gets_event_type_events()
    {
        $eventType = EventType::factory()->create();
        $events = Event::factory()
            ->count(2)
            ->create([
                'event_type_id' => $eventType->id,
            ]);

        $response = $this->getJson(
            route('api.event-types.events.index', $eventType)
        );

        $response->assertOk()->assertSee($events[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_event_type_events()
    {
        $eventType = EventType::factory()->create();
        $data = Event::factory()
            ->make([
                'event_type_id' => $eventType->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.event-types.events.store', $eventType),
            $data
        );

        $this->assertDatabaseHas('events', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $event = Event::latest('id')->first();

        $this->assertEquals($eventType->id, $event->event_type_id);
    }
}
