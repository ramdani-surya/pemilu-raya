<?php

namespace Database\Factories;

use App\Models\Voting;
use Illuminate\Database\Eloquent\Factories\Factory;

class VotingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Voting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'election_id' => 13,
            'voter_id' => $this->faker->numberBetween(27, 126),
            'candidate_id' => $this->faker->numberBetween(3, 5),
        ];
    }
}
