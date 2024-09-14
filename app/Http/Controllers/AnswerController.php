<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
  

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Answer $answer)
    {

        foreach ($request->all() as $ans_wer) {
            Answer::where('id', $ans_wer['id'])->update([
            'answer' => $ans_wer['answer'],
            'correct_answer' => $ans_wer['correct_answer'],
        ]);
    }


        return redirect('questions-main-page')->with('success','تم تحديث البيانات بنجاح');

    }

}
