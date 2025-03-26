<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\MainOrganizer;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MainOrganizerTest extends TestCase
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
    public function it_gets_main_organizers_list()
    {
        $mainOrganizers = MainOrganizer::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.main-organizers.index'));

        $response->assertOk()->assertSee($mainOrganizers[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_main_organizer()
    {
        $data = MainOrganizer::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.main-organizers.store'), $data);

        $this->assertDatabaseHas('main_organizers', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_main_organizer()
    {
        $mainOrganizer = MainOrganizer::factory()->create();

        $data = [
            'name' => $this->faker->text,
            'img' => $this->faker->text,
            'position' => $this->faker->text,
            'email' => $this->faker->text,
            'phone' => $this->faker->text,
        ];

        $response = $this->putJson(
            route('api.main-organizers.update', $mainOrganizer),
            $data
        );

        $data['id'] = $mainOrganizer->id;

        $this->assertDatabaseHas('main_organizers', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_main_organizer()
    {
        $mainOrganizer = MainOrganizer::factory()->create();

        $response = $this->deleteJson(
            route('api.main-organizers.destroy', $mainOrganizer)
        );

        $this->assertModelMissing($mainOrganizer);

        $response->assertNoContent();
    }
}
