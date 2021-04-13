<?php

namespace Database\Factories;

use App\Models\Voter;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VoterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Voter::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'     => 1,
            'election_id' => 13,
            'nim'         => $this->faker->word,
            'name'        => $this->faker->name,
            'token'       => Str::random(6),
        ];
    }
}
