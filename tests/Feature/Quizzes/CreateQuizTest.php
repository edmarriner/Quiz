<?php

namespace Tests\Feature\Quizzes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateQuizTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_a_new_quiz()
    {
        $this->authenticate();

        $testResponse = $this->postJson('/api/quiz', [
            'name' => 'test',
            'description' => 'A sample test',
        ]);

        $testResponse
            ->assertSuccessful()
            ->assertJsonStructure([
                'id',
                'name',
                'description'
            ]);
    }

    public function test_fails_validate_if_missing_data(){

        $this->authenticate();

        $testResponse = $this->postJson('/api/quiz', []);

        $testResponse
            ->assertStatus(422);
    }
}
