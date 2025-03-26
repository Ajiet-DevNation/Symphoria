<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\EventOrganizer;

use App\Models\Event;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventOrganizerTest extends TestCase
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
    public function it_gets_event_organizers_list()
    {
        $eventOrganizers = EventOrganizer::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.event-organizers.index'));

        $response->assertOk()->assertSee($eventOrganizers[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_event_organizer()
    {
        $data = EventOrganizer::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.event-organizers.store'), $data);

        $this->assertDatabaseHas('event_organizers', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_event_organizer()
    {
        $eventOrganizer = EventOrganizer::factory()->create();

        $event = Event::factory()->create();

        $data = [
            'email' => $this->faker->text,
            'name' => $this->faker->text,
            'position' => $this->faker->text,
            'phone' => $this->faker->text,
            'img' => $this->faker->text,
            'event_id' => $event->id,
        ];

        $response = $this->putJson(
            route('api.event-organizers.update', $eventOrganizer),
            $data
        );

        $data['id'] = $eventOrganizer->id;

        $this->assertDatabaseHas('event_organizers', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_event_organizer()
    {
        $eventOrganizer = EventOrganizer::factory()->create();

        $response = $this->deleteJson(
            route('api.event-organizers.destroy', $eventOrganizer)
        );

        $this->assertModelMissing($eventOrganizer);

        $response->assertNoContent();
    }
}
