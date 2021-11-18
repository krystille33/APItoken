<?php

namespace Database\Factories;

use App\Models\jobapplication;
use Illuminate\Database\Eloquent\Factories\Factory;

class jobapplicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = jobapplication::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->word,
        'lastname' => $this->faker->word,
        'address' => $this->faker->word,
        'email' => $this->faker->word,
        'phonenumber' => $this->faker->randomDigitNotNull,
        'position' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
