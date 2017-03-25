<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hashids;
use Auth;

class ProfileController extends Controller
{
    public function getProfile()
    {
        $user = User::findOrFail(Auth::id());
        return view('frontend.profile',['user' => $user]);
    }

    public function editProfile()
    {
        $user = User::findOrFail(Auth::id());
        return view('frontend.edit_profile', ['user' => $user]);
    }

    public function postProfile(Request $request)
    {

    }
}
