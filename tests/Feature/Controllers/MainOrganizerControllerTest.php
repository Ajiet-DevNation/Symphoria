<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\MainOrganizer;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MainOrganizerControllerTest extends TestCase
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
    public function it_displays_index_view_with_main_organizers()
    {
        $mainOrganizers = MainOrganizer::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('main-organizers.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.main_organizers.index')
            ->assertViewHas('mainOrganizers');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_main_organizer()
    {
        $response = $this->get(route('main-organizers.create'));

        $response->assertOk()->assertViewIs('app.main_organizers.create');
    }

    /**
     * @test
     */
    public function it_stores_the_main_organizer()
    {
        $data = MainOrganizer::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('main-organizers.store'), $data);

        $this->assertDatabaseHas('main_organizers', $data);

        $mainOrganizer = MainOrganizer::latest('id')->first();

        $response->assertRedirect(
            route('main-organizers.edit', $mainOrganizer)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_main_organizer()
    {
        $mainOrganizer = MainOrganizer::factory()->create();

        $response = $this->get(route('main-organizers.show', $mainOrganizer));

        $response
            ->assertOk()
            ->assertViewIs('app.main_organizers.show')
            ->assertViewHas('mainOrganizer');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_main_organizer()
    {
        $mainOrganizer = MainOrganizer::factory()->create();

        $response = $this->get(route('main-organizers.edit', $mainOrganizer));

        $response
            ->assertOk()
            ->assertViewIs('app.main_organizers.edit')
            ->assertViewHas('mainOrganizer');
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

        $response = $this->put(
            route('main-organizers.update', $mainOrganizer),
            $data
        );

        $data['id'] = $mainOrganizer->id;

        $this->assertDatabaseHas('main_organizers', $data);

        $response->assertRedirect(
            route('main-organizers.edit', $mainOrganizer)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_main_organizer()
    {
        $mainOrganizer = MainOrganizer::factory()->create();

        $response = $this->delete(
            route('main-organizers.destroy', $mainOrganizer)
        );

        $response->assertRedirect(route('main-organizers.index'));

        $this->assertModelMissing($mainOrganizer);
    }
}
