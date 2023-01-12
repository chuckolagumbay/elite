<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Crew;

class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'crew_id' => Crew::factory(),
            'code' => $this->faker->randomAscii(),
            'name' => $this->faker->name(),
            'document_number' => $this->faker->unique()->randomNumber(),
            'date_issued' => $this->faker->dateTimeThisMonth(),
            'date_expiry' => $this->faker->dateTimeThisYear(),
            'remarks' => $this->faker->realText(),
        ];
    }
}
