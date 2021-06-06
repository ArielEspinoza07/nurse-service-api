<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\MedicalNote;
use App\Models\MedicalNoteType;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedicalNoteFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MedicalNote::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'                 => $this->faker->name,
            'note'                 => $this->faker->paragraph,
            'medical_note_type_id' => MedicalNoteType::query()
                                                     ->inRandomOrder()
                                                     ->first()->id,
            'user_id'              => User::query()
                                          ->inRandomOrder()
                                          ->first()->id,
        ];
    }
}
