<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
use Spatie\Permission\Exceptions\RoleDoesNotExist;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SetupRolesAndPermissionsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'role:create-with-permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create and setup roles and permissions';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        foreach (config('permissions') as $roleData) {
            try {
                $role = Role::findByName($roleData['name']);
            } catch (RoleDoesNotExist $e) {
                $role = Role::create(['name' => $roleData['name']]);
            }

            foreach ($roleData['permissions'] as $permissionName => $permissionEnabled) {
                try {
                    $permission = Permission::findByName($permissionName);
                } catch (PermissionDoesNotExist $e) {
                    $permission = Permission::create(['name' => $permissionName]);
                }

                if ($permissionEnabled) {
                    $role->givePermissionTo($permission);
                } else {
                    $role->revokePermissionTo($permission);
                }
            }
        }

        return Command::SUCCESS;
    }
}
