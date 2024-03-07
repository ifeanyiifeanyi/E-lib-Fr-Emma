<?php

namespace App\Http\Controllers\Member;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ActivatedCode;
use App\Models\ActivationCode;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $books = Book::where('status', 'active')->orderBy('created_at', 'desc')->get();
        return view("member.dashboard", compact('books'));
    }

    public function bookDetails($slug)
    {
        $book = Book::where('slug', $slug)->firstOrFail();
        if ($book) {
            $bookTags = $book->tags()->get();
        } else {
            $bookTags = collect(); // or return an empty collection in some other way
        }
        return view('member.bookDetails.bookDetails', compact('book', 'bookTags'));
    }

    public function submitAccessCode()
    {
        return view('member.bookDetails.submitAccessCode');
    }

    public function file($slug)
    {
        $book = Book::where('slug', $slug)->firstOrFail();

        // $book->viewBook();

        return redirect($book->file_url);
    }

    public function submitAccessCodeStore(Request $request)
    {
        $request->validate([
            'pass_code' => 'required|numeric',
            'password'  => 'required|current_password'
        ]);

        $code = ActivationCode::whereCode($request->pass_code)->inactive()->first();
        $user = User::find($request->userId);

        if (!$user) {
            return redirect()->back()->withErrors(['password' => 'Invalid user credentials!']);
        }

        if (!$code) {
            return redirect()->back()->withErrors(['pass_code' => 'Invalid or already activated code!']);
        }
        if ($code->is_active) {
            return redirect()->back()->withErrors(['pass_code' => 'Code has already been activated']);
        }

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
            'message' => 'Access Granted!!!',
            'alert-type' => 'success'
        );


        return redirect()->route('member.dashboard')->with($notification);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
