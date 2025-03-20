<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Sponser;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SponserControllerTest extends TestCase
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
    public function it_displays_index_view_with_sponsers()
    {
        $sponsers = Sponser::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('sponsers.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.sponsers.index')
            ->assertViewHas('sponsers');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_sponser()
    {
        $response = $this->get(route('sponsers.create'));

        $response->assertOk()->assertViewIs('app.sponsers.create');
    }

    /**
     * @test
     */
    public function it_stores_the_sponser()
    {
        $data = Sponser::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('sponsers.store'), $data);

        $this->assertDatabaseHas('sponsers', $data);

        $sponser = Sponser::latest('id')->first();

        $response->assertRedirect(route('sponsers.edit', $sponser));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_sponser()
    {
        $sponser = Sponser::factory()->create();

        $response = $this->get(route('sponsers.show', $sponser));

        $response
            ->assertOk()
            ->assertViewIs('app.sponsers.show')
            ->assertViewHas('sponser');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_sponser()
    {
        $sponser = Sponser::factory()->create();

        $response = $this->get(route('sponsers.edit', $sponser));

        $response
            ->assertOk()
            ->assertViewIs('app.sponsers.edit')
            ->assertViewHas('sponser');
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

        $response = $this->put(route('sponsers.update', $sponser), $data);

        $data['id'] = $sponser->id;

        $this->assertDatabaseHas('sponsers', $data);

        $response->assertRedirect(route('sponsers.edit', $sponser));
    }

    /**
     * @test
     */
    public function it_deletes_the_sponser()
    {
        $sponser = Sponser::factory()->create();

        $response = $this->delete(route('sponsers.destroy', $sponser));

        $response->assertRedirect(route('sponsers.index'));

        $this->assertModelMissing($sponser);
    }
}
