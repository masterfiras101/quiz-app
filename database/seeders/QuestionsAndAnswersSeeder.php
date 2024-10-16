<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;
class QuestionsAndAnswersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          Question::factory()
            ->count(10) // Create 10 questions
            ->hasAnswers(3) // Each question will have 3 answers
            ->create();
    }
}
