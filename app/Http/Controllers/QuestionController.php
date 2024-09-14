<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Inertia\Inertia;
class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions=Question::with('answers')->get();
        return Inertia::render('Questions/Questions_main',[
            'questions'=> $questions
        ]);
    }


   
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
   
        $request_data = $request->all();
        $question = $request_data['question'];
        $new_question = new   Question;
        $new_question->question=$question;
        $new_question->save();

        $answers = $request_data['answers'];

        foreach($answers as $answer){
            $new_answer = new Answer;
            $new_answer->answer=$answer['answer'];
            $new_answer->question_id= $new_question->id;
            $new_answer->correct_answer=$answer['correct_answer'];
            $new_answer->save();
        }
        return redirect('questions-main-page')->with('success','تم انشاء السؤال مع الإجابة بنجاح');
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        //
        $q_id=$request['id'];
        $q_question = $request['question'];
        $update_q = Question::findOrFail($q_id);
        $update_q->question = $q_question;
        $update_q->save();

        return redirect('questions-main-page')->with('success','تم   تعديل السؤال   بنجاح');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $question_id)
    {
        $question_delete = Question::findOrFail($question_id);
        $question_delete->delete();
        return redirect('questions-main-page')->with('success','تم   حذف السؤال   بنجاح');
    }

}
