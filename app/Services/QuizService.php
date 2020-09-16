<?php


namespace App\Services;


use App\DTOs\Quiz\CreateQuizDTO;
use App\DTOs\Quiz\EditQuizDTO;
use App\Models\Quiz;
use Illuminate\Support\Facades\DB;

class QuizService
{

    private TimelineService $timeline;

    public function __construct(TimelineService $timeline){
        $this->timeline = $timeline;
    }

    public function createNewQuiz(CreateQuizDTO $input): Quiz {

        $quiz = Quiz::create([
            'name' => $input->name,
            'description' => $input->description,
        ]);

        $this->timeline->entry($quiz, 'New quiz created')
            ->withMessage('Name', $input->name);

        return $quiz;
    }

    /**
     * Update multiple quiz details in a single transaction
     */
    public function editQuiz(Quiz $quiz, EditQuizDTO $input): Quiz {

        DB::transaction(function() use ($input, &$quiz) {

            if ($input->name != null) {
                $quiz = $this->renameQuiz($quiz, $input->name);
            }

            if ($input->description != null) {
                $quiz = $this->updateDescription($quiz, $input->description);
            }

        });

        return $quiz;
    }

    public function renameQuiz(Quiz $quiz, string $newName): Quiz {

        $previousName = $quiz->name;
        $quiz->name = $newName;
        $quiz->save();

        $this->timeline->entry($quiz, 'Quiz has been renamed')
            ->withTransition('Name', $previousName, $newName);

        return $quiz;
    }


    public function updateDescription(Quiz $quiz, string $newDescription): Quiz {

        $previousDescription = $quiz->description;
        $quiz->description = $newDescription;
        $quiz->save();

        $this->timeline->entry($quiz, 'Quiz description has been updated')
            ->withTransition('Description', $previousDescription, $newDescription);

        return $quiz;
    }
}
