<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Branch::factory()
            ->count(3)
            ->state([
                'organization_id' => Organization::first()
            ])
            ->create()
            ->each(function(Branch $branch){
                User::factory()
                    ->state([
                        'branch_id' => $branch->id
                    ])
                    ->create()
                    ->each(fn(User $user) => $user->assignRole(data_get(config('permissions'), "manager.name")));

                User::factory()
                    ->customer()
                    ->count(9)
                    ->state([
                        'branch_id' => $branch->id
                    ])
                    ->create()
                    ->each(fn(User $user) => $user->assignRole(data_get(config('permissions'), "customer.name")));
            });
    }
}
