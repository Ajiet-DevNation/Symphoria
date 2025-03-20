<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\EventOrganizer;

use App\Models\Event;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventOrganizerControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_event_organizers()
    {
        $eventOrganizers = EventOrganizer::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('event-organizers.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.event_organizers.index')
            ->assertViewHas('eventOrganizers');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_event_organizer()
    {
        $response = $this->get(route('event-organizers.create'));

        $response->assertOk()->assertViewIs('app.event_organizers.create');
    }

    /**
     * @test
     */
    public function it_stores_the_event_organizer()
    {
        $data = EventOrganizer::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('event-organizers.store'), $data);

        $this->assertDatabaseHas('event_organizers', $data);

        $eventOrganizer = EventOrganizer::latest('id')->first();

        $response->assertRedirect(
            route('event-organizers.edit', $eventOrganizer)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_event_organizer()
    {
        $eventOrganizer = EventOrganizer::factory()->create();

        $response = $this->get(route('event-organizers.show', $eventOrganizer));

        $response
            ->assertOk()
            ->assertViewIs('app.event_organizers.show')
            ->assertViewHas('eventOrganizer');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_event_organizer()
    {
        $eventOrganizer = EventOrganizer::factory()->create();

        $response = $this->get(route('event-organizers.edit', $eventOrganizer));

        $response
            ->assertOk()
            ->assertViewIs('app.event_organizers.edit')
            ->assertViewHas('eventOrganizer');
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

        $response = $this->put(
            route('event-organizers.update', $eventOrganizer),
            $data
        );

        $data['id'] = $eventOrganizer->id;

        $this->assertDatabaseHas('event_organizers', $data);

        $response->assertRedirect(
            route('event-organizers.edit', $eventOrganizer)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_event_organizer()
    {
        $eventOrganizer = EventOrganizer::factory()->create();

        $response = $this->delete(
            route('event-organizers.destroy', $eventOrganizer)
        );

        $response->assertRedirect(route('event-organizers.index'));

        $this->assertModelMissing($eventOrganizer);
    }
}
