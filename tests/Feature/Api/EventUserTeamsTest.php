<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Event;
use App\Models\UserTeam;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventUserTeamsTest extends TestCase
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
    public function it_gets_event_user_teams()
    {
        $event = Event::factory()->create();
        $userTeams = UserTeam::factory()
            ->count(2)
            ->create([
                'event_id' => $event->id,
            ]);

        $response = $this->getJson(
            route('api.events.user-teams.index', $event)
        );

        $response->assertOk()->assertSee($userTeams[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_event_user_teams()
    {
        $event = Event::factory()->create();
        $data = UserTeam::factory()
            ->make([
                'event_id' => $event->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.events.user-teams.store', $event),
            $data
        );

        $this->assertDatabaseHas('user_teams', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $userTeam = UserTeam::latest('id')->first();

        $this->assertEquals($event->id, $userTeam->event_id);
    }
}
