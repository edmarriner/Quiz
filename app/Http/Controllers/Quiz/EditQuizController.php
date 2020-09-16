<?php

namespace App\Http\Controllers\Quiz;

use App\DTOs\Quiz\EditQuizDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditQuizRequest;
use App\Models\Quiz;
use App\Services\QuizService;

class EditQuizController extends Controller
{
    public function __invoke(int $id, EditQuizRequest $request, QuizService $quizService)
    {

        $quiz = Quiz::findOrFail($id);

        $data = $request->validated();

        $dto = new EditQuizDTO($data['name'], $data['description']);

        return $quizService->editQuiz($quiz, $dto);

    }
}
