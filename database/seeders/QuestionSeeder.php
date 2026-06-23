<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        Question::truncate();

        Question::create([
            'title' => 'Algebra: Linear equations',
            'body' => 'What is the value of x if 2x + 3 = 11?',
            'options' => json_encode(['2', '3', '4', '5']),
            'answer' => '4',
            'explanation' => '2x + 3 = 11 => 2x = 8 => x = 4',
            'difficulty' => 'easy',
            'type' => 'mcq'
        ]);

        Question::create([
            'title' => 'Geography: Capitals',
            'body' => 'What is the capital of France?',
            'options' => json_encode(['Paris', 'Berlin', 'Rome', 'Madrid']),
            'answer' => 'Paris',
            'explanation' => 'Paris is the capital of France.',
            'difficulty' => 'easy',
            'type' => 'mcq'
        ]);
    }
}
