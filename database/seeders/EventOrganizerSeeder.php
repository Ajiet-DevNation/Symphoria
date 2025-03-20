<?php

namespace Database\Seeders;

use App\Models\EventOrganizer;
use Illuminate\Database\Seeder;

class EventOrganizerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EventOrganizer::factory()
            ->count(5)
            ->create();
    }
}
