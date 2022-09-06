<?php

namespace Database\Factories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'user_id' => User::factory('App\Models\User'),
            'project_name' => $this->faker->text(10),
            'task_name'=> $this->faker->text(10),
            'start_date'=> now(),
            'end_date'=> now(),
            'status' => $this->faker->randomElement(["Pending","On Process","Done" ]),
            'priority' => $this->faker->randomElement(["Urgent","High","Medium","Low" ]),
            'task_description'=> $this->faker->text(10),
        ];
    }
}
