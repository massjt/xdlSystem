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
        return view('Index',['questions' => $questions]);
    }

    // 最热问题
    public function getHot(Request $request)
    {
        dd($request->ip);
    }
}
