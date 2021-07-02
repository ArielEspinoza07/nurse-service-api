<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

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
            'show_',
            'create_',
            'update_',
            'delete_',
            'restore_'
        ];
        $modules     = [
            'notes',
            'note_types',
            'permissions',
            'roles',
            'users',
            'work_shifts',
            'work_shift_times',
        ];
        $permissions = array_map(function ($module) use ($actions) {
            return array_map(function ($action) use ($module) {
                return [
                    'name'       => $action === 'list_' ? $action.$module : $action.Str::singular($module),
                    'guard_name' => 'api',
                    'created_at' => now(),
                ];
            }, $actions);
        }, $modules);
        $permissions = collect($permissions)
            ->collapse()
            ->toArray();
        Permission::query()
                  ->insert($permissions);
    }
}
