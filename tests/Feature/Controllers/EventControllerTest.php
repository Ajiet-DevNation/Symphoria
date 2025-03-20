<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Event;

use App\Models\EventType;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventControllerTest extends TestCase
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
    public function it_displays_index_view_with_events()
    {
        $events = Event::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('events.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.events.index')
            ->assertViewHas('events');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_event()
    {
        $response = $this->get(route('events.create'));

        $response->assertOk()->assertViewIs('app.events.create');
    }

    /**
     * @test
     */
    public function it_stores_the_event()
    {
        $data = Event::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('events.store'), $data);

        $this->assertDatabaseHas('events', $data);

        $event = Event::latest('id')->first();

        $response->assertRedirect(route('events.edit', $event));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_event()
    {
        $event = Event::factory()->create();

        $response = $this->get(route('events.show', $event));

        $response
            ->assertOk()
            ->assertViewIs('app.events.show')
            ->assertViewHas('event');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_event()
    {
        $event = Event::factory()->create();

        $response = $this->get(route('events.edit', $event));

        $response
            ->assertOk()
            ->assertViewIs('app.events.edit')
            ->assertViewHas('event');
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

        $response = $this->put(route('events.update', $event), $data);

        $data['id'] = $event->id;

        $this->assertDatabaseHas('events', $data);

        $response->assertRedirect(route('events.edit', $event));
    }

    /**
     * @test
     */
    public function it_deletes_the_event()
    {
        $event = Event::factory()->create();

        $response = $this->delete(route('events.destroy', $event));

        $response->assertRedirect(route('events.index'));

        $this->assertModelMissing($event);
    }
}
