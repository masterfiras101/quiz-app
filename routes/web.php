<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



Route::get('/ss', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);

});


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //Route for the main splash screen page
    Route::get('/', function () {
        return Inertia('Splashscreen');
    });
});

require __DIR__.'/auth.php';
// Fallback route to handle any undefined routes (404 error page)
Route::fallback(function () {
    return Inertia('404_page');
});

// Route for the main contact screen page
Route::get('/contact-us', function () {
    return Inertia('ContactUs/ContactUsPage');
});

Route::get('/help', function () {
    return Inertia('Help/HelpPage');
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


    // report
    Route::get('/report', function () {
    return Inertia('Questions/QuestionsReports/QuestionsReportPage');   
        });
});

Route::controller(App\Http\Controllers\AnswerController::class)->group(function () {
    // Handle updating answers on the answers page
    Route::put('/answers-main-page', 'update');
});

