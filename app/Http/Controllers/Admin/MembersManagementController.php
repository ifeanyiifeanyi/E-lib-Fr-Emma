<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivatedCode;
use App\Models\ActivationCode;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MembersManagementController extends Controller
{

    public function index(){
        $users = User::where('role', '!=', 'admin')->latest()->paginate(5);
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

    public function makeRole($user){
        $admin = auth()->user();
        if ($admin->role == 'admin' && $admin->super_access == 1) {

            $user = User::where('username', $user)->first();
            $user->role = 'admin';
            $user->updated_at = Carbon::now();
            $user->save();
            $notification = array(
            'message' => 'User Staff Access Has Been Activated!!',
                'alert-type' =>'success'
            );
            return redirect()->back()->with($notification);
        }
        $notification = [

         'message' => 'You are not allowed to perform this action',
             'alert-type' =>'error'
         ];
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



    public function setCode($username){
        $user = User::where('username', $username)->first();
        $codes = ActivationCode::where('status', 'inactive')->inRandomOrder()->limit(5)->get();
        return view('admin.members.ActivateCodeForUser', compact('user', 'codes'));
    }


    public function StoreMangedCode(Request $request){
        $user = User::where('id', $request->userId)->first();
        // $code = ActivationCode::where('code', $request->code)->where('status','inactive')->first();
        $code = ActivationCode::whereCode($request->code)->inactive()->first();
        // dd($code);

        // update activation code status
        $code->status = 'activated';
        $code->save();


        // update user columns associated with the activation code
        $user->pass_code = $code->code;
        $user->pass_code_used = (int)$user->pass_code_used + 1;
        $user->save();

        $managedCode = new ActivatedCode();
        $managedCode->user_id = $user->id;
        $managedCode->code_id = $code->id;
        $managedCode->activated_at = Carbon::now();
        $managedCode->expires_at = Carbon::now()->addYear();
        $managedCode->save();
        $notification = array(
            'message' => 'User Account Has Been verified!!',
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
