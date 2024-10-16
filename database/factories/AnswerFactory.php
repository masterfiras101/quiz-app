<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Question;
use App\Models\Answer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Answer::class;

    public function definition(): array
    {
        return [
            'answer' => $this->faker->word(), // Random answer word
            'correct_answer' => $this->faker->boolean(), // Random boolean value for correct answer
            'question_id' => Question::factory(), // Associate with a new Question
        ];
    }
}
