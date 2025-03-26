<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Event;
use App\Models\EventRule;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventEventRulesTest extends TestCase
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
    public function it_gets_event_event_rules()
    {
        $event = Event::factory()->create();
        $eventRules = EventRule::factory()
            ->count(2)
            ->create([
                'event_id' => $event->id,
            ]);

        $response = $this->getJson(
            route('api.events.event-rules.index', $event)
        );

        $response->assertOk()->assertSee($eventRules[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_event_event_rules()
    {
        $event = Event::factory()->create();
        $data = EventRule::factory()
            ->make([
                'event_id' => $event->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.events.event-rules.store', $event),
            $data
        );

        unset($data['event_id']);

        $this->assertDatabaseHas('event_rules', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $eventRule = EventRule::latest('id')->first();

        $this->assertEquals($event->id, $eventRule->event_id);
    }
}
