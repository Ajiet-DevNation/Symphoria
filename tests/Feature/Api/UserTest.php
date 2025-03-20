<?php

namespace Tests\Feature\Api;

use App\Models\User;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
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
    public function it_gets_users_list()
    {
        $users = User::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.users.index'));

        $response->assertOk()->assertSee($users[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_user()
    {
        $data = User::factory()
            ->make()
            ->toArray();
        $data['password'] = \Str::random('8');

        $response = $this->postJson(route('api.users.store'), $data);

        unset($data['password']);
        unset($data['email_verified_at']);

        $this->assertDatabaseHas('users', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_user()
    {
        $user = User::factory()->create();

        $data = [
            'uid' => $this->faker->text(255),
            'name' => $this->faker->text,
            'email' => $this->faker->text(10),
            'phone' => $this->faker->text,
            'usn' => $this->faker->text,
            'is_paid' => $this->faker->boolean,
            'payment_screenshot' => $this->faker->text,
            'transaction_id' => $this->faker->text,
            'college_name' => $this->faker->text,
            'pass_type' => 'base',
            'id_card' => $this->faker->text,
        ];

        $data['password'] = \Str::random('8');

        $response = $this->putJson(route('api.users.update', $user), $data);

        unset($data['password']);
        unset($data['email_verified_at']);

        $data['id'] = $user->id;

        $this->assertDatabaseHas('users', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_user()
    {
        $user = User::factory()->create();

        $response = $this->deleteJson(route('api.users.destroy', $user));

        $this->assertModelMissing($user);

        $response->assertNoContent();
    }
}
