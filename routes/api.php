<?php

use App\Http\Controllers\Quiz\CreateNewQuizController;
use App\Http\Controllers\Quiz\EditQuizController;
use App\Http\Controllers\Quiz\ListQuizzesController;
use App\Http\Controllers\QuizRound\CreateQuizRoundController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function(){

    // List the quizzes
    Route::get('/quizzes', ListQuizzesController::class);

    // Create a new quiz
    Route::post('/quiz', CreateNewQuizController::class);

    // View a quiz
    Route::get('/quizzes/{id}', ListQuizzesController::class);

    // Edit basic details
    Route::put('/quiz/{id}', EditQuizController::class)
        ->where('id', '[0-9]+');

    // Create a quiz round
    Route::post("/quizzes/{quizId}/rounds", CreateQuizRoundController::class)
        ->where('quizId', '[0-9]+');
});
