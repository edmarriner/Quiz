<?php


namespace App\Services;


use App\Models\Quiz;
use App\Models\QuizRound;

class QuizRoundService
{
    public function createQuizRound(Quiz $quiz, $name) {

        $highestOrder = QuizRound::query()
            ->where('quiz_id', $quiz->id)
            ->select('order')
            ->orderBy('order')
            ->first();

        $round = QuizRound::make([
            'name' => $name,
            'order' => $highestOrder->order ?? 1,
        ]);

        $quiz->rounds()->save($round);


        $this->timeline->entry($quiz, 'New quiz created')
            ->withMessage('Name', $input->name);

        return $round;
    }
}
