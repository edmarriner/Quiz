<?php

namespace Tests\Feature\Quizzes;

use App\Models\Quiz;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListQuizzesTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_quizzes()
    {

        $this->authenticate();

        $quizzes = Quiz::factory()->count(10)->create();

        $testResponse = $this->getJson('/api/quizzes', []);

        $testResponse
            ->assertJson($quizzes->toArray());
    }
}
