<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Events\QuestionViewCount;
use Illuminate\Support\Facades\Cache;
use Vinkla\Hashids\Facades\Hashids;
use Event;
use Carbon\Carbon;

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
        $questions = Question::orderBy('created_at')->paginate(3);
        return view('Index',['questions' => $questions]);
    }
    // 单个问题处理
    public function getSingleQues(Request $request,$id)
    {
        $id = Hashids::decode($id)[0];
        $question = Cache::remember('ques:cache'.$id, self::modelCacheExpires, function() use ($id) {
            return Question::where('id', $id)->first();
        });
        $client_ip = $request->ip();

        Event::fire(new QuestionViewCount($question,$client_ip));
        return view('frontend.singleQues', ['question' => $question]);
    }
    /**
    @params $Qviews     问题的浏览次数
    @params $Qanswers   回答的数量
    @params $Qscore     问题得分
    @params $Ascores    回答得分
    @params $date_ask   提问时间
    @params $date_active    最后一个回答时间
    
    */
    protected function quesHot($Qviews, $Qanswers, $Qscore, $Ascores, $date_ask, $date_active)
    {
        $Qage = (time() - strtotime(gmdate("Y-m-d H:i:s",strtotime($date_ask)))) / 3600;
        $Qage = round($Qage, 1);
    
        $Qupdated = (time() - strtotime(gmdate("Y-m-d H:i:s",strtotime($date_active)))) / 3600;
        $Qupdated = round($Qupdated, 1);
    
        $dividend = (log10($Qviews)*4) + (($Qanswers * $Qscore)/5) + $Ascores;
        $divisor = pow((($Qage + 1) - ($Qage - $Qupdated)/2), 1.5);
    
        return $dividend/$divisor . "\n";
    }
}
