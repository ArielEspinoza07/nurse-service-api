<?php

namespace Database\Seeders;

use App\Models\Role;
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
        Role::query()
            ->insert([
                [
                    'name'       => 'admin',
                    'guard_name' => 'api',
                    'created_at' => now(),
                ],
                [
                    'name'       => 'nurse',
                    'guard_name' => 'api',
                    'created_at' => now(),
                ],
            ]);
    }
}
