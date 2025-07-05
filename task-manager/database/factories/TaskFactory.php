<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'deadline' => $this->faker->date(),
            'status' => $this->faker->randomElement(['jauns', 'procesā', 'pabeigts']),
            'user_id' => User::factory(),
        ];
    }
}