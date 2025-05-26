<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\DestinationSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(DestinationSeeder::class);
    }
}
