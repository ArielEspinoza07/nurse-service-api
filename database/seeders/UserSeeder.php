<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()
            ->create([
                'name'              => 'admin',
                'email'             => env('ADMIN_EMAIL','admin@admin.com'),
                'email_verified_at' => now(),
                'password'          => env('ADMIN_PASSWORD','root'),
            ]);
        $user->syncRoles('admin');
    }
}
