<?php

use Illuminate\Support\Facades\Route;



// Route for the main splash screen page
Route::get('/', function () {
    return Inertia('Splashscreen');
});

// Fallback route to handle any undefined routes (404 error page)
Route::fallback(function () {
    return Inertia('404_page');
});

// Grouped routes for managing questions using QuestionController
Route::controller(App\Http\Controllers\QuestionController::class)->group(function () {
    // Display the main questions page
    Route::get('/questions-main-page','index');
    // Handle creating new questions
    Route::post('/questions-main-page','store');
    // Handle updating existing questions
    Route::put('/questions-main-page','update');
    // Handle deleting a specific question
    Route::delete('/questions-main-page/{question_id}','destroy');
});

// Grouped routes for generating quizzes using GenerateSingleQuizzController
Route::controller(App\Http\Controllers\Quizz\GenerateSingleQuizzController::class)->group(function () {
    // Display the page to generate a single quiz
    Route::get('/generate-single-quizz','index');
    // Submit quiz results for a generated quiz
    Route::post('/GenerateQuizz/GenerateSingleQuizzResult','results');
    // Display the page to choose an exam language
    Route::get('/generate-exam-choose-language','choose_language');
    // Start the exam in the chosen language
    Route::get('/generate-exam-choose-language/{language}','start_language_exam');
});

// Grouped routes for managing answers using AnswerController
Route::controller(App\Http\Controllers\AnswerController::class)->group(function () {
    // Handle updating answers on the answers page
    Route::put('/answers-main-page', 'update');
});








