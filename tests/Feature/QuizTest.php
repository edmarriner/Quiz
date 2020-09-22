<?php

use App\Models\Quiz;
use App\User;
use Laravel\Passport\Passport;
use function Pest\Laravel\getJson;
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

test('can list quizzes', function(){

    Passport::actingAs(User::factory()->create(), [
        'create-quiz'
    ]);

    Quiz::insert([
        ['name' => 'test quiz']
    ]);

    $testResponse = getJson('/api/quizzes', []);

    $testResponse
        ->assertJson([
            [ 'name' => 'test quiz' ]
        ]);
});

test('can filter quizzes by name', function(){

    Passport::actingAs(User::factory()->create(), [
        'create-quiz'
    ]);

    Quiz::insert([
        ['name' => 'test quiz'],
        ['name' => 'sample'],
    ]);

    $testResponse = getJson('/api/quizzes?filter[name]=sample', []);

    assert(sizeof($testResponse->json()) === 1);

});
