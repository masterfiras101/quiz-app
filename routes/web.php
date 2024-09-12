<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;




Route::fallback(function () {
    return Inertia('404_page');
});


Route::get('/', function () {
    return Inertia('Splashscreen');
});

Route::get('/questions-main-page',[QuestionController::class,'index']);
Route::post('/questions-main-page',[QuestionController::class,'store']);
Route::put('/answers-main-page', [AnswerController::class,'update']);

Route::get('/single-quizz',[QuestionController::class,'generate_single_quizz']);





// Route::get('/single-question', function () {
//     return Inertia('');
// });

// Route::get('/questions-main-page', function () {
//     return Inertia('Questions/Questions_main');
// });



