<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminMembersController extends Controller
{
    public function index(){
        $admins = User::where('role', 'admin')->get();
        return view('admin.adminMembers.index', compact('admins')) ;
    }

    public function create(){
        return view('admin.adminMembers.createAdmin');
    }

    public function store(Request $request){
        $request->validate([
            'name' =>'required|string',
            'username' =>'required|string|unique:users',
            'email' =>'required|email|unique:users',
            'phone' =>'required|string',
        ]);

        User::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'photo' => 'https://placehold.co/600x400?text='.$request->username,
            'email_verified_at' => Carbon::now(), 
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'role' => 'admin',
            'super_access' => $request->has('super_access') ? '1' : '0',
            'password' => Hash::make('12345678'),
        ]);

        $notification = [
            'message' => 'New staff account created!',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function view($username){
        $user = User::where('username', $username)->where('role', 'admin')->first();
        return view('admin.adminMembers.adminUserProfile', compact('user'));
    }

    public function delete($username){
        $user = User::where('username', $username)->where('role', 'admin')->first();

        if($user->delete()){
            if (!empty($user->photo) && file_exists(public_path($user->photo))) {
                unlink(public_path($user->photo));
            }
        }
        $notification = array(
            'message' => 'Staff Account Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
