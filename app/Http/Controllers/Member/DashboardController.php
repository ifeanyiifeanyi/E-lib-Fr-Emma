<?php

namespace App\Http\Controllers\Member;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class DashboardController extends Controller
{
    public function dashboard(){
        $books = Book::where('status', 'active')->orderBy('created_at', 'desc')->get();
        return view("member.dashboard", compact('books'));
    }

    public function bookDetails($slug){
        $book = Book::where('slug', $slug)->firstOrFail();
        if ($book) {
            $bookTags = $book->tags()->get();
        } else {
            $bookTags = collect(); // or return an empty collection in some other way
        }
        return view('member.bookDetails.bookDetails', compact('book', 'bookTags'));
    }

    public function submitAccessCode(){
        return view('member.bookDetails.submitAccessCode');
    }

    public function file($slug) 
    {
        $book = Book::where('slug', $slug)->firstOrFail();
    
        // $book->viewBook();

        return redirect($book->file_url);
    }    


    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
