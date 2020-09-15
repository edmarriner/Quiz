<?php

namespace App\Http\Controllers\Quiz;

use App\DTOs\Quiz\CreateQuizDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewQuizRequest;
use App\Services\QuizService;

class CreateNewQuizController extends Controller
{
    public function __invoke(CreateNewQuizRequest $request, QuizService $quizService)
    {
        $data = $request->validated();

        $dto = new CreateQuizDTO($data['name'], $data['description']);

        return $quizService->createNewQuiz($dto);
    }
}
