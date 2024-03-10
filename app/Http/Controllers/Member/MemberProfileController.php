<?php

namespace App\Http\Controllers\Member;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MemberProfileController extends Controller
{
    public function index()
    {
        return view('member.profile.index', ['user' => auth()->user()]);
    }
    public function create()
    {
        return view('admin.profile.create');
    }

    public function booksHistory()
    {
        $user = Auth::user();
        $books = $user->viewedBooks()->simplePaginate(10); 
        return view('member.profile.bookHistory', compact('books'));
    }


    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $request->validate([
            'name' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:10000',
        ]);

        if ($request->hasFile('photo')) {
            $old_image = $user->photo;

            if (!empty($old_image) && file_exists(public_path($old_image))) {
                unlink(public_path($old_image));
            }

            $thumb = $request->file('photo');
            $extension = $thumb->getClientOriginalExtension();
            $thumbFile = time() . "." . $extension;
            $thumb->move('user/profile/', $thumbFile);
            $user->photo = 'user/profile/' . $thumbFile;
        } elseif (empty($user->photo)) {
            return back()->withErrors(['photo' => 'The image field is required.']);
        }


        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();
        $notification = [
            'message' => 'Profile Details Updated!',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function updatePassword()
    {
        return view('member.profile.updateProfilePassword', ['user' => auth()->user()]);
    }

    public function updatePasswordStore(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'different:current_password'],
        ]);

        $user = User::find(Auth::user()->id);

        if (Hash::check($user->password, $request->password)) {
            return redirect()->back()->withErrors(['password' => 'New password cannot be the same as your current password']);
        }
        $user->password = Hash::make($request->password);
        $user->save();
        $notification = [
            'message' => 'Password Details Updated!',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }
}
