<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissionsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::query()
                     ->get();
        foreach ($roles as $role) {
            $role->syncPermissions($this->getPermissions($role->name));
        }
    }


    private function getPermissions(string $role): array
    {
        $permissions = [
            'admin' => $this->getAdminPermissions(),
            'nurse' => $this->getNursePermissions(),
        ];

        return $permissions[ $role ];
    }


    private function getAdminPermissions(): array
    {
        $results = DB::select('SELECT name
FROM permissions
ORDER BY id');

        return collect($results)
            ->pluck('name')
            ->toArray();
    }


    private function getNursePermissions(): array
    {
        $results = DB::select('SELECT name
FROM permissions
WHERE name NOT IN (
    SELECT name
    FROM permissions
    WHERE name like "%user%"
      AND name NOT LIKE "%show%"
      AND name NOT LIKE "%update%"
)
  AND name NOT LIKE "%role%"
  AND name NOT LIKE "%permission%"
  AND name NOT LIKE "%work_shift_time%"
  AND name NOT LIKE "%note_type%"
ORDER BY id');

        return collect($results)
            ->pluck('name')
            ->toArray();
    }
}
