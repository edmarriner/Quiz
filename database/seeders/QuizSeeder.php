<?php

namespace Database\Seeders;

use App\DTOs\Quiz\CreateQuizDTO;
use App\Models\Quiz;
use App\Services\QuizService;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{

    /**
     * @var QuizService
     */
    private QuizService $quizService;

    public function __construct(QuizService $quizService)
    {
        $this->quizService = $quizService;
    }

    public function run()
    {
        Quiz::factory()
            ->count(10)
            ->make()
            ->each(fn($quiz) => $this->createQuiz($quiz));
    }

    private function createQuiz(Quiz $quiz) {
        $quiz = $this->quizService->createNewQuiz(new CreateQuizDTO(
            $quiz->name,
            $quiz->description
        ));


    }
}
