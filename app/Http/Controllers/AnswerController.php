<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Answer $answer)
    {
        
        // return $request->all();
        // $answers = $request->all();
        // foreach ($answers as $a) {

        //     $id = $a['id'];
        //     $updateAnswer = Answer::findOrFail($id);
        //     $updateAnswer->answer=$a['answer'];
        //     $updateAnswer->correct_answer=$a['correct_answer'];
        //     $updateAnswer->save();
        // }

        foreach ($request->all() as $ans_wer) {
            Answer::where('id', $ans_wer['id'])->update([
            'answer' => $ans_wer['answer'],
            'correct_answer' => $ans_wer['correct_answer'],
        ]);
    }


        return redirect('questions-main-page')->with('success','تم تحديث البيانات بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Answer $answer)
    {
        //
    }
}
