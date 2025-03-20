<?php

namespace Database\Seeders;

use App\Models\MainOrganizer;
use Illuminate\Database\Seeder;

class MainOrganizerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MainOrganizer::factory()
            ->count(5)
            ->create();
    }
}
