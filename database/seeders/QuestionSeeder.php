<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample data from past exams
        $questions = [
            [
                'text' => 'What is the time complexity of binary search?',
                'answer' => 'O(log n)',
                'explanation' => 'Binary search divides the search interval in half each time, leading to a logarithmic time complexity.',
            ],
            [
                'text' => 'Explain the concept of polymorphism in Object-Oriented Programming.',
                'answer' => 'Polymorphism allows objects to be treated as instances of their parent class.',
                'explanation' => 'It is a core concept in OOP that allows methods to do different things based on the object it is acting upon.',
            ],
            [
                'text' => 'What is the difference between HTTP and HTTPS?',
                'answer' => 'HTTPS is HTTP with encryption.',
                'explanation' => 'HTTPS uses TLS/SSL to encrypt the data transferred between the client and server, providing a secure communication channel.',
            ],
        ];

        // Insert questions into the database
        foreach ($questions as $question) {
            Question::create($question);
        }
    }
}

