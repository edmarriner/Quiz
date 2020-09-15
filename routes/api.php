<?php

use App\Http\Controllers\Quiz\CreateNewQuizController;
use App\Http\Controllers\Quiz\EditQuizController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function(){

    // Create a new quiz
    Route::post('/quiz', CreateNewQuizController::class);

    // Edit basic details
    Route::put('/quiz/{id}', EditQuizController::class)
        ->where('id', '[0-9]+');
});
