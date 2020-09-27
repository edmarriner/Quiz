<?php


namespace App\Services;


use App\DTOs\Quiz\EditQuizDTO;
use App\DTOs\Quiz\EditQuizRoundDTO;
use App\Models\Quiz;
use App\Models\QuizRound;
use DB;

class QuizRoundService
{

    /**
     * @var TimelineService
     */
    private TimelineService $timelineService;

    public function __construct(TimelineService $timelineService)
    {
        $this->timelineService = $timelineService;
    }

    public function createQuizRound(Quiz $quiz, string $name) {

        $round = QuizRound::make([
            'name' => $name,
        ]);

        // Assign the next highest order
        $round->order = $this->calculateNextRoundOrder($quiz);

        $quiz->rounds()->save($round);

        $this->timelineService->entry($quiz, 'New quiz round created')
            ->withMessage('Name', $name);

        return $round;
    }

    public function editQuizRound(QuizRound $quizRound, EditQuizRoundDTO $dto) {

        DB::transaction(function() use (&$quizRound, $dto) {

            if($dto->name != null) {
                $quizRound = $this->renameQuizRound($quizRound, $dto->name);
            }

        });

        return $quizRound;
    }

    public function renameQuizRound(QuizRound $quizRound, $name): QuizRound {

        $previousName = $quizRound->name;

        $quizRound->name = $name;
        $quizRound->save();

        $this->timelineService->entry($quizRound, 'Round renamed')
            ->withTransition('Name', $previousName, $name);

        return $quizRound;
    }

    private function calculateNextRoundOrder(Quiz $quiz):int {

        $highest = QuizRound::query()
            ->where('quiz_id', $quiz->id)
            ->select('order')
            ->orderBy('order')
            ->first();

        return $highest->order ?? 1;
    }



}
