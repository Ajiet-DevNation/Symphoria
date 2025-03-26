<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\UserTeam;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserUserTeamsTest extends TestCase
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
    public function it_gets_user_user_teams()
    {
        $user = User::factory()->create();
        $userTeam = UserTeam::factory()->create();

        $user->userTeams()->attach($userTeam);

        $response = $this->getJson(route('api.users.user-teams.index', $user));

        $response->assertOk()->assertSee($userTeam->id);
    }

    /**
     * @test
     */
    public function it_can_attach_user_teams_to_user()
    {
        $user = User::factory()->create();
        $userTeam = UserTeam::factory()->create();

        $response = $this->postJson(
            route('api.users.user-teams.store', [$user, $userTeam])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $user
                ->userTeams()
                ->where('user_teams.id', $userTeam->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_user_teams_from_user()
    {
        $user = User::factory()->create();
        $userTeam = UserTeam::factory()->create();

        $response = $this->deleteJson(
            route('api.users.user-teams.store', [$user, $userTeam])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $user
                ->userTeams()
                ->where('user_teams.id', $userTeam->id)
                ->exists()
        );
    }
}
