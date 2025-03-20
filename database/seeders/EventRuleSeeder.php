<?php

namespace Database\Seeders;

use App\Models\EventRule;
use Illuminate\Database\Seeder;

class EventRuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EventRule::factory()
            ->count(5)
            ->create();
    }
}
