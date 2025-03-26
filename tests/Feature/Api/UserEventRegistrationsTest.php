<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\EventRegistration;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserEventRegistrationsTest extends TestCase
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
    public function it_gets_user_event_registrations()
    {
        $user = User::factory()->create();
        $eventRegistrations = EventRegistration::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(
            route('api.users.event-registrations.index', $user)
        );

        $response->assertOk()->assertSee($eventRegistrations[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_user_event_registrations()
    {
        $user = User::factory()->create();
        $data = EventRegistration::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.event-registrations.store', $user),
            $data
        );

        $this->assertDatabaseHas('event_registrations', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $eventRegistration = EventRegistration::latest('id')->first();

        $this->assertEquals($user->id, $eventRegistration->user_id);
    }
}
