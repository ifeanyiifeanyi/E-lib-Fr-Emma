<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MembersManagementController extends Controller
{
    public function index(){
        $users = User::where('role', '!=', 'admin')->latest()->get();
        return view('admin.members.index', compact('users'));
    }

    public function show($user){
        $user = User::where('username', $user)->first();
        return view('admin.members.show', compact('user'));
    }

    public function verify($user){
        // dd(Carbon::now());
        $user = User::where('username', $user)->first();
        $user->email_verified_at = Carbon::now();
        $user->updated_at = Carbon::now();
        $user->save();
        $notification = array(
            'message' => 'User Account Has Been verified!!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function deactivate($user){
        // dd(Carbon::now());
        $user = User::where('username', $user)->first();
        $user->email_verified_at = NULL;
        $user->updated_at = Carbon::now();
        $user->save();
        $notification = array(
            'message' => 'User Account Has Been Deactivated!!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function destroy($username){
         User::where('username', $username)->delete();
         $notification = array(
            'message' => 'User Account Deleted!!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.members.view')->with($notification);

    }
}
