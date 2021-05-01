<?php

namespace Database\Factories;

use App\Models\Computer;
use App\Models\User;
use App\Models\Motherboard;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComputerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Computer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'motherboard_id' => function () {
                return Motherboard::factory()->create()->id;
            },
            'is_public' => false
        ];
    }
}
