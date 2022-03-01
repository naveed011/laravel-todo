<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'task_title'=>$this->faker->text(45),
            'scheduled_at'=>$this->faker->dateTime
        ];
    }
}
