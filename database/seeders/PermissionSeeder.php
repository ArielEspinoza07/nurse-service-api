<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $actions     = [
            'list_',
            'create_',
            'update_',
            'delete_',
            'restore_'
        ];
        $modules     = [
            'notes',
            'permissions',
            'roles',
            'users',
        ];
        $permissions = array_map(function ($module) use ($actions) {
            return array_map(function ($action) use ($module) {
                return $action.$module;
            }, $actions);
        }, $modules);
        foreach (collect($permissions)
                     ->collapse()
                     ->toArray() as $permission) {
            Permission::factory()
                      ->create(['name' => $permission]);
        }
    }
}
