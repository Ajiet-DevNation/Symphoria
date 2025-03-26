<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Event;
use App\Models\EventRegistration;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventEventRegistrationsTest extends TestCase
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
    public function it_gets_event_event_registrations()
    {
        $event = Event::factory()->create();
        $eventRegistrations = EventRegistration::factory()
            ->count(2)
            ->create([
                'event_id' => $event->id,
            ]);

        $response = $this->getJson(
            route('api.events.event-registrations.index', $event)
        );

        $response->assertOk()->assertSee($eventRegistrations[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_event_event_registrations()
    {
        $event = Event::factory()->create();
        $data = EventRegistration::factory()
            ->make([
                'event_id' => $event->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.events.event-registrations.store', $event),
            $data
        );

        $this->assertDatabaseHas('event_registrations', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $eventRegistration = EventRegistration::latest('id')->first();

        $this->assertEquals($event->id, $eventRegistration->event_id);
    }
}
