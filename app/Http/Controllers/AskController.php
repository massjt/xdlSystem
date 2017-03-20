<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;
use App\Models\Techtag;

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

        
    }
}
