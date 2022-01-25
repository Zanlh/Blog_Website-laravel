<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('frontend.home');
    }

    public function profile()
    {
        return view('frontend.profile');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('frontend.edit_profile', compact('user'));
    }

    public function updateUserProfile($id, Request $request)
    {
    }
}
