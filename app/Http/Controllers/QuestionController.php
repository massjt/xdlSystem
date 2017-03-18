<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use Auth;
use Cache;

class QuestionController extends Controller
{
    const modelCacheExpires = 10;
    // 首页最新问题
    public function getIndex()
    {
        $questions = Question::orderBy('created_at')->paginate(3);
        return view('Index',['questions' => $questions]);
    }

    // 最热问题
    // 根据页面访问量
    public function getHot(Request $request)
    {
    
    }
    // 单个问题处理
    public function getQuestionCache(Request $request,$id)
    {
        $questions = Cache::remember('ques:cache'.$id, self::modelCacheExpires, function() use ($id) {
            return Question::where('id', $id)->first();
        });

        $client_ip = $request->ip();

        Event::fire(new QuestionViewCount($question,$client_ip));
    }
