<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $admin = User::factory()->create([
             'email' => 'admin@email.com',
             'branch_id' => Branch::first()
         ]);

        $admin->assignRole(data_get(config('permissions'), "admin.name"));
    }
}
