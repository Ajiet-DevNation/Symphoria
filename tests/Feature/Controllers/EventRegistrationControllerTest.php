<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\EventRegistration;

use App\Models\Event;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventRegistrationControllerTest extends TestCase
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
    public function it_displays_index_view_with_event_registrations()
    {
        $eventRegistrations = EventRegistration::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('event-registrations.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.event_registrations.index')
            ->assertViewHas('eventRegistrations');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_event_registration()
    {
        $response = $this->get(route('event-registrations.create'));

        $response->assertOk()->assertViewIs('app.event_registrations.create');
    }

    /**
     * @test
     */
    public function it_stores_the_event_registration()
    {
        $data = EventRegistration::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('event-registrations.store'), $data);

        $this->assertDatabaseHas('event_registrations', $data);

        $eventRegistration = EventRegistration::latest('id')->first();

        $response->assertRedirect(
            route('event-registrations.edit', $eventRegistration)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_event_registration()
    {
        $eventRegistration = EventRegistration::factory()->create();

        $response = $this->get(
            route('event-registrations.show', $eventRegistration)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.event_registrations.show')
            ->assertViewHas('eventRegistration');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_event_registration()
    {
        $eventRegistration = EventRegistration::factory()->create();

        $response = $this->get(
            route('event-registrations.edit', $eventRegistration)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.event_registrations.edit')
            ->assertViewHas('eventRegistration');
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

        $response = $this->put(
            route('event-registrations.update', $eventRegistration),
            $data
        );

        $data['id'] = $eventRegistration->id;

        $this->assertDatabaseHas('event_registrations', $data);

        $response->assertRedirect(
            route('event-registrations.edit', $eventRegistration)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_event_registration()
    {
        $eventRegistration = EventRegistration::factory()->create();

        $response = $this->delete(
            route('event-registrations.destroy', $eventRegistration)
        );

        $response->assertRedirect(route('event-registrations.index'));

        $this->assertModelMissing($eventRegistration);
    }
}
