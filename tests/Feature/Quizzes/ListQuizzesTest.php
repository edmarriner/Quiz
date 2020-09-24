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

    public function test_can_filter_quizzes()
    {

        $this->authenticate();

        Quiz::factory()->count(10)->create();
        $quiz = Quiz::first();
        $quiz->name = 'test';
        $quiz->save();

        $testResponse = $this->getJson('/api/quizzes?filter[name]=test');

        $testResponse
            ->assertJsonCount(1)
            ->assertJson([$quiz->toArray()]);
    }
}
