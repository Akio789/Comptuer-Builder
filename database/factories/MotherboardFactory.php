<?php

namespace Database\Factories;

use App\Models\Motherboard;
use Illuminate\Database\Eloquent\Factories\Factory;

class MotherboardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Motherboard::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'brand' => $this->faker->name,
            'price' => $this->faker->numberBetween(1, 100),
            'model' => $this->faker->name,
            'socket' => $this->faker->numberBetween(1000, 2000),
        ];
    }
}
