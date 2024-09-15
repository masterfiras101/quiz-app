<?php

namespace App\Http\Controllers\Quizz;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Question;
use Illuminate\Support\Facades\File;


class GenerateSingleQuizzController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $questions = Question::with(['answers'=>function($query){
            $query->inRandomOrder();
        }])->inRandomOrder()->get();

        return Inertia::render('GenerateQuizz/GenerateSingleQuizz',[
            'questions'=>$questions,
        ]);

    }

    public function results(Request $request){
        
        $score = $request[0]['results']['score'];
        $totalQuestions = $request[0]['results']['totalQuestions'];
        $percntag= ceil($score/$totalQuestions*100);
        $comment= match(true){
            $percntag>= 80 &&  $percntag<=100 => 'مستواك ممتاز',
            $percntag>= 60 &&  $percntag<=79 => 'مستواك جيد',
            $percntag>= 40 &&  $percntag<=59 => 'مستواك ضعيف',
            $percntag>= 39 => 'راسب',
            default =>'فاشل'
        };
        return Inertia::render('GenerateQuizz/GenerateSingleQuizzResult',[
            'percentag'=>$percntag,
            'comment'=>$comment
        ]
         );
    }
    public function choose_language(){
      
        // Path to the JSON file in the public directory
        $filePath = public_path('assets/quiz_language_main/LanguagesHeader.json');

        // Check if the file exists
        if (!File::exists($filePath)) {
            abort(404, 'File not found');
        }

        // Get the content of the JSON file
        $jsonContent = File::get($filePath);
        $languages = json_decode($jsonContent, true);

        // Pass the data to the Vue component using Inertia
        return Inertia::render('GenerateQuizz/GenerateExam', [
            'languages' => $languages
        ]);
    }

    public function start_language_exam($language){
        $filePath = public_path("assets/quiz_languages/{$language}.json");

        if (!file_exists($filePath)) {
            abort(404, 'Quiz file not found');
        }
        $questions = json_decode(file_get_contents($filePath), true);

        return Inertia::render('GenerateQuizz/LanguageExam/GenerateLanguageExam', [
            'questions' => $questions,
            'language' => $language
        ]);
    }




}
