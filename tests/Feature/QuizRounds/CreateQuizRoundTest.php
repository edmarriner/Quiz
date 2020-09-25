<?php

namespace Tests\Feature\QuizRounds;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateQuizRoundTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_quiz_round()
    {
        $this->authenticate();

        $quiz::firstOrFail();

        $response = $this->post('/quizzes/');

        $response->assertStatus(200);
    }
}
