<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberProfileController extends Controller
{
    public function index(){
        return view('member.profile.index', ['user' => auth()->user()]);
    }

    public function updatePassword(){
        return view('member.profile.updateProfilePassword', ['user' => auth()->user()]);
    }
}
