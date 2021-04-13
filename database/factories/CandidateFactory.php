<?php

namespace Database\Factories;

use App\Models\Candidate;
use Illuminate\Database\Eloquent\Factories\Factory;

class CandidateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Candidate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'election_id'        => 13,
            'candidate_number'   => $this->faker->randomDigitNot(0),
            'chairman_name'      => $this->faker->name,
            'vice_chairman_name' => $this->faker->name,
            'vision'             => $this->faker->paragraph,
            'mission'            => $this->faker->paragraph,
        ];
    }
}
