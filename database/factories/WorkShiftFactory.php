<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\WorkShift;
use App\Models\WorkShiftTime;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkShiftFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WorkShift::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'work_date'          => $this->faker->date(),
            'extra'              => $this->faker->boolean,
            'work_shift_time_id' => WorkShiftTime::query()
                                                 ->inRandomOrder()
                                                 ->latest()
                                                 ->first()->id,
            'user_id'            => User::query()
                                        ->inRandomOrder()
                                        ->latest()
                                        ->first()->id,
        ];
    }
}
