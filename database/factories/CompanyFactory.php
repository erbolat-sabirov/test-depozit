<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $date = $this->faker->date();
        return [
            'name' => $this->faker->company(),
            'country_id' => Country::inRandomOrder()->first()->id,
            'created_at' => $date,
            'created_at' => $date,
        ];
    }
}