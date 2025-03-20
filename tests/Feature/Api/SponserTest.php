<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Sponser;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SponserTest extends TestCase
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
    public function it_gets_sponsers_list()
    {
        $sponsers = Sponser::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.sponsers.index'));

        $response->assertOk()->assertSee($sponsers[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_sponser()
    {
        $data = Sponser::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.sponsers.store'), $data);

        $this->assertDatabaseHas('sponsers', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_sponser()
    {
        $sponser = Sponser::factory()->create();

        $data = [
            'name' => $this->faker->text,
            'img' => $this->faker->text,
            'description' => $this->faker->sentence(15),
            'site' => $this->faker->text,
        ];

        $response = $this->putJson(
            route('api.sponsers.update', $sponser),
            $data
        );

        $data['id'] = $sponser->id;

        $this->assertDatabaseHas('sponsers', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_sponser()
    {
        $sponser = Sponser::factory()->create();

        $response = $this->deleteJson(route('api.sponsers.destroy', $sponser));

        $this->assertModelMissing($sponser);

        $response->assertNoContent();
    }
}
