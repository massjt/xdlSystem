<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use Auth;

class QuestionController extends Controller
{
    // 首页最新问题
    public function getIndex()
    {
        $questions = Question::orderBy('created_at')->paginate(3);
        // foreach($questions as $question) {
            // foreach($question->operating as $gg) {
            //     dd($gg->voteup);
            // }
            // dd($question->operating->where('voteup','false')->count());
        // }
        return view('Index',['questions' => $questions]);
    }
}
