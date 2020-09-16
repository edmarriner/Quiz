<?php

use App\User;
use Laravel\Passport\Passport;
use function Pest\Laravel\postJson;

test('can create a new quiz', function(){

    Passport::actingAs(User::factory()->create(), [
        'create-quiz'
    ]);

    $testResponse = postJson('/api/quiz', [
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
});

test('fails to create test if not all required fields present', function(){

    Passport::actingAs(User::factory()->create(), [
        'create-quiz'
    ]);

    $testResponse = postJson('/api/quiz', []);

    $testResponse
        ->assertStatus(422);
});
