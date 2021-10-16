<?php

namespace Database\Seeders;

use App\Models\WorkShiftTime;
use Illuminate\Database\Seeder;

class WorkShiftTimeSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WorkShiftTime::query()
                     ->insert([
                         [
                             'name'       => 'mañana',
                             'start_at'   => date('H:i:s', strtotime('06:00:00')),
                             'end_at'     => date('H:i:s', strtotime('14:00:00')),
                             'created_at' => now(),
                         ],
                         [
                             'name'       => 'tarde',
                             'start_at'   => date('H:i:s', strtotime('14:00:00')),
                             'end_at'     => date('H:i:s', strtotime('22:00:00')),
                             'created_at' => now(),
                         ],
                         [
                             'name'       => 'noche',
                             'start_at'   => date('H:i:s', strtotime('22:00:00')),
                             'end_at'     => date('H:i:s', strtotime('06:00:00')),
                             'created_at' => now(),
                         ],
                     ]);
    }
}
