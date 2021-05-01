<?php

namespace Database\Factories;

use App\Models\Component;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComponentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Component::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'socket' => $this->faker->randomNumber(),
            'brand' => $this->faker->name(),
            'model' => $this->faker->name(),
            'price' => $this->faker->numberBetween(1, 100),
            'type' => $this->faker->name()
        ];
    }
}
