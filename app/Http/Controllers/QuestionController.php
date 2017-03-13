<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    // 首页最新问题
    public function getIndex()
    {
        $questions = Question::orderBy('created_at')->paginate(3);
        // foreach($questions as $question) {
        //     foreach($question->techtags as $qt) {
        //         dd($qt->name);
        //     }
        // }
        return view('Index',['questions' => $questions]);
    }
}
