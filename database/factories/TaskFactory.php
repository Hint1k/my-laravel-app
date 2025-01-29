<?php //created with console command: php artisan make:factory TaskFactory --model=Task

namespace Database\Factories;

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
    public function definition(): array
    {
        return [ // this is manually written code
            'title' => fake()->sentence,
            'description' => fake()->paragraph,
            'long_description' => fake()->paragraph(7,true),
            'completed' => fake()->boolean
        ];
    }
}
