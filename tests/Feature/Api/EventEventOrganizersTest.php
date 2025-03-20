<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Event;
use App\Models\EventOrganizer;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventEventOrganizersTest extends TestCase
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
    public function it_gets_event_event_organizers()
    {
        $event = Event::factory()->create();
        $eventOrganizers = EventOrganizer::factory()
            ->count(2)
            ->create([
                'event_id' => $event->id,
            ]);

        $response = $this->getJson(
            route('api.events.event-organizers.index', $event)
        );

        $response->assertOk()->assertSee($eventOrganizers[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_event_event_organizers()
    {
        $event = Event::factory()->create();
        $data = EventOrganizer::factory()
            ->make([
                'event_id' => $event->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.events.event-organizers.store', $event),
            $data
        );

        $this->assertDatabaseHas('event_organizers', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $eventOrganizer = EventOrganizer::latest('id')->first();

        $this->assertEquals($event->id, $eventOrganizer->event_id);
    }
}
