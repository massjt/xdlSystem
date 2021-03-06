<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use Auth;

class IndexController extends Controller
{
    public function getLogin()
    {
        if (Auth::check()) {
            return redirect()->intended('questions');
        }
        return view('frontend.login');
    }

    public function postLogin(Request $request)
    {
        $create = $request->only(['email','password','captcha']);
        $validator = Validator::make($create,[
            'email' => 'required|email',
            'captcha' => 'required|captcha',
            'password' => 'required|min:6'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator)->with(['fail' => 'error']);
        }

        if (!Auth::guard()->attempt(['email' => $request->email, 'password' => $request->password],$request->remember_me)) {
            return redirect()->back()->withInput()->with(['use_pwd_fail' => '用户名或密码错误']);
        }
        return redirect()->intended('questions')->with(['success' => '欢迎进入兄弟连问答勾搭会所']);
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('get.login');
    }
}
