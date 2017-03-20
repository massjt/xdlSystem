<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;
use App\Models\Techtag;
use App\Models\Question;
use App\Models\QuestionsTechtag;

class AskController extends Controller
{
    public function getIndex()
    {
        $techtags = Techtag::all();

        return view('frontend.ask', ['techtags' => $techtags]);
    }

    public function postIndex(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'tag_name' => 'required',
            'ask_content' => 'required'
        ]);
        /*
            array:3 [▼
            0 => "1"
            1 => "2"
            2 => "3"
            ]
        */
        $tag_name = explode(',' ,$request->tag_name);
        
        $question = new Question(['title' => $request->title,'content' => $request->ask_content]);
        //$question->title = $request->title;
        //$question->content = $request->ask_content;

        $techtags = Techtag::find($tag_name);
        foreach($techtags as $techtag) {
            $techtag->questions->save($question);// 有问题
        }
        return redirect()->route('new.questions');
    }
}
