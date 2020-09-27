<?php

namespace App\Http\Controllers\Quiz;

use App\DTOs\Quiz\EditQuizRoundDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditQuizRoundRequest;
use App\Models\QuizRound;
use App\Services\QuizRoundService;

class EditQuizRoundController extends Controller
{
    public function __invoke(int $quizId, int $id, EditQuizRoundRequest $request, QuizRoundService $service)
    {

        $input = $request->validated();

        $quizRound = QuizRound::findOrFail($id);

        EditQuizRoundDTO::fromArray($input);

        $service->editQuizRound($quizRound, $input);
    }
}
