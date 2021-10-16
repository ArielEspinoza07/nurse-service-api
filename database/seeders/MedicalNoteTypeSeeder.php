<?php

namespace Database\Seeders;

use App\Models\MedicalNoteType;
use Illuminate\Database\Seeder;

class MedicalNoteTypeSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MedicalNoteType::query()
                       ->insert([
                           [
                               'name'       => 'Cardiologia',
                               'created_at' => now(),
                           ],
                           [
                               'name'       => 'Cirugia',
                               'created_at' => now(),
                           ],
                           [
                               'name'       => 'Emergencias',
                               'created_at' => now(),
                           ],
                           [
                               'name'       => 'Ginecología y Obstetricia',
                               'created_at' => now(),
                           ],
                           [
                               'name'       => 'Pediatria',
                               'created_at' => now(),
                           ],
                           [
                               'name'       => 'Radiología e imágenes',
                               'created_at' => now(),
                           ],
                       ]);
    }
}
