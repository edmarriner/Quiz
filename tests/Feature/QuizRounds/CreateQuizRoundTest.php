<?php

namespace Tests\Feature\QuizRounds;

use App\Models\Quiz;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateQuizRoundTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_quiz_round()
    {
        $this->seed();

        $this->authenticate();

        $quiz = Quiz::firstOrFail();

        $response = $this->post("/api/quizzes/{$quiz->id}/rounds", [
            'name' => 'Sample round'
        ]);

        $response
            ->assertSuccessful();
    }
}
