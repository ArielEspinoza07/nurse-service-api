<?php

namespace Database\Factories;

use App\Models\WorkShiftTime;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkShiftTimeFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WorkShiftTime::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'     => $this->faker->name,
            'start_at' => $this->faker->time(),
            'end_at'   => $this->faker->time(),
        ];
    }
}
