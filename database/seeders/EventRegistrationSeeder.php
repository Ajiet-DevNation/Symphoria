<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EventRegistration;

class EventRegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EventRegistration::factory()
            ->count(5)
            ->create();
    }
}
