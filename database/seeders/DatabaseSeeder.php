<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleAndPermissionSeeder::class);
        $this->call(OrganizationSeeder::class);
        $this->call(BranchSeeder::class);
        $this->call(UserSeeder::class);
    }
}
