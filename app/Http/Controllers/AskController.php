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
        $tag_name = explode(',' ,$request->tag_name);
        
        //$question = new Question(['title' => $request->title,'content' => $request->ask_content]);
        $question = new Question();
        $question->title = $request->title;
        $question->content = $request->ask_content;
        $question->save();

        $techtags = Techtag::find($tag_name);

        foreach($techtags as $techtag) {
            $techtag->questions()->attach($question->id);
        }
       
        return redirect()->route('new.questions')->with(['success' => '提问成功,请等待回答!']);
    }
}
