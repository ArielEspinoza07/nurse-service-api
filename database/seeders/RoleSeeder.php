<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'admin' => Permission::query()
                                 ->select('name')
                                 ->get()
                                 ->pluck('name')
                                 ->toArray(),
            'nurse' => Permission::query()
                                 ->select('name')
                                 ->where('name', 'like', '%notes%')
                                 ->get()
                                 ->pluck('name')
                                 ->toArray(),
        ];
        foreach ($roles as $role => $permissions) {
            Role::factory()
                ->create(['name' => $role])
                ->syncPermissions($permissions);
        }
    }
}
