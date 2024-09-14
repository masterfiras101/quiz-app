<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnswerController;




Route::fallback(function () {
    return Inertia('404_page');
});


Route::get('/', function () {
    return Inertia('Splashscreen');
});

Route::controller(App\Http\Controllers\QuestionController::class)->group(function () {
        Route::get('/questions-main-page','index');
        Route::post('/questions-main-page','store');
        Route::put('/questions-main-page','update');
        Route::delete('/questions-main-page/{question_id}','destroy');

});

Route::controller(App\Http\Controllers\Quizz\GenerateSingleQuizzController::class)->group(function () {
    Route::get('/generate-single-quizz','index');
    // Route::get('/GenerateQuizz/GenerateSingleQuizzResult','index_result');
    // Route::get('/generate-single-quizz','choose_language');

    Route::get('/generate-exam-choose-language','choose_language');

    Route::get('/generate-exam-choose-language/{language}','start_language_exam');


    Route::post('/GenerateQuizz/GenerateSingleQuizzResult','results');


});
Route::controller(App\Http\Controllers\AnswerController::class)->group(function () {
    Route::put('/answers-main-page', 'update');
});







