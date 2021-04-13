<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\Candidate::factory(3)->create();
        // \App\Models\Voter::factory(100)->create();
        \App\Models\Voting::factory(70)->create();
    }
}
