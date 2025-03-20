<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\EventType;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventTypeControllerTest extends TestCase
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
    public function it_displays_index_view_with_event_types()
    {
        $eventTypes = EventType::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('event-types.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.event_types.index')
            ->assertViewHas('eventTypes');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_event_type()
    {
        $response = $this->get(route('event-types.create'));

        $response->assertOk()->assertViewIs('app.event_types.create');
    }

    /**
     * @test
     */
    public function it_stores_the_event_type()
    {
        $data = EventType::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('event-types.store'), $data);

        $this->assertDatabaseHas('event_types', $data);

        $eventType = EventType::latest('id')->first();

        $response->assertRedirect(route('event-types.edit', $eventType));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_event_type()
    {
        $eventType = EventType::factory()->create();

        $response = $this->get(route('event-types.show', $eventType));

        $response
            ->assertOk()
            ->assertViewIs('app.event_types.show')
            ->assertViewHas('eventType');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_event_type()
    {
        $eventType = EventType::factory()->create();

        $response = $this->get(route('event-types.edit', $eventType));

        $response
            ->assertOk()
            ->assertViewIs('app.event_types.edit')
            ->assertViewHas('eventType');
    }

    /**
     * @test
     */
    public function it_updates_the_event_type()
    {
        $eventType = EventType::factory()->create();

        $data = [
            'type' => $this->faker->text,
        ];

        $response = $this->put(route('event-types.update', $eventType), $data);

        $data['id'] = $eventType->id;

        $this->assertDatabaseHas('event_types', $data);

        $response->assertRedirect(route('event-types.edit', $eventType));
    }

    /**
     * @test
     */
    public function it_deletes_the_event_type()
    {
        $eventType = EventType::factory()->create();

        $response = $this->delete(route('event-types.destroy', $eventType));

        $response->assertRedirect(route('event-types.index'));

        $this->assertModelMissing($eventType);
    }
}
