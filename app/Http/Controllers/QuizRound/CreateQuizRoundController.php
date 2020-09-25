<?php

namespace App\Http\Controllers\QuizRound;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateQuizRoundRequest;
use App\Models\Quiz;
use App\Services\QuizRoundService;

class CreateQuizRoundController extends Controller
{
    public function __invoke(int $quizId, CreateQuizRoundRequest $request, QuizRoundService $service)
    {
        $quiz = Quiz::findOrFail($quizId);

        $input = $request->validated();

        return $service->createQuizRound($quiz, $input['name']);
    }
}
