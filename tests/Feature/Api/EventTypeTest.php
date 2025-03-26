<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\EventType;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventTypeTest extends TestCase
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
    public function it_gets_event_types_list()
    {
        $eventTypes = EventType::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.event-types.index'));

        $response->assertOk()->assertSee($eventTypes[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_event_type()
    {
        $data = EventType::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.event-types.store'), $data);

        $this->assertDatabaseHas('event_types', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.event-types.update', $eventType),
            $data
        );

        $data['id'] = $eventType->id;

        $this->assertDatabaseHas('event_types', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_event_type()
    {
        $eventType = EventType::factory()->create();

        $response = $this->deleteJson(
            route('api.event-types.destroy', $eventType)
        );

        $this->assertModelMissing($eventType);

        $response->assertNoContent();
    }
}
