<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        return [
            'titulo' => $this->faker->word(),
            'descricao' => $this->faker->sentence(),
            'esta_completa' => $this->faker->boolean(),
        ];
    }
}
