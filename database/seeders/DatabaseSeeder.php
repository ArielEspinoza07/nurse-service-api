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
        $this->call([
            WorkShiftTimeSeeder::class,
            MedicalNoteTypeSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            RolePermissionsSeeder::class,
            UserSeeder::class,
        ]);
    }
}
