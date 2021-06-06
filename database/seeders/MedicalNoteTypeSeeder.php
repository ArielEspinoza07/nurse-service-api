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
        $departments = [
            'Cardiologia',
            'Cirugia',
            'Emergencias',
            'Ginecología y Obstetricia',
            'Pediatria',
            'Radiología e imágenes',
        ];

        foreach ($departments as $department) {
            MedicalNoteType::factory()
                           ->create(['name' => $department]);
        }
    }
}
