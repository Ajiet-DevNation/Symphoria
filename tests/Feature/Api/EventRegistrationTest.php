<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\EventRegistration;

use App\Models\Event;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventRegistrationTest extends TestCase
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
    public function it_gets_event_registrations_list()
    {
        $eventRegistrations = EventRegistration::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.event-registrations.index'));

        $response->assertOk()->assertSee($eventRegistrations[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_event_registration()
    {
        $data = EventRegistration::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.event-registrations.store'),
            $data
        );

        $this->assertDatabaseHas('event_registrations', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_event_registration()
    {
        $eventRegistration = EventRegistration::factory()->create();

        $event = Event::factory()->create();
        $user = User::factory()->create();

        $data = [
            'event_id' => $event->id,
            'user_id' => $user->id,
        ];

        $response = $this->putJson(
            route('api.event-registrations.update', $eventRegistration),
            $data
        );

        $data['id'] = $eventRegistration->id;

        $this->assertDatabaseHas('event_registrations', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_event_registration()
    {
        $eventRegistration = EventRegistration::factory()->create();

        $response = $this->deleteJson(
            route('api.event-registrations.destroy', $eventRegistration)
        );

        $this->assertModelMissing($eventRegistration);

        $response->assertNoContent();
    }
}
