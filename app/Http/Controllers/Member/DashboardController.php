<?php

namespace App\Http\Controllers\Member;

use App\Models\Tag;
use App\Models\Book;
use App\Models\User;
use App\Models\Genre;
use App\Models\Category;
use App\Models\UserBook;
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
        $books = Book::where('status', 'active')->orderBy('created_at', 'desc')->simplePaginate(20);
        $categories = Category::latest()->inRandomOrder()->take(10)->get();
        $genres = Genre::latest()->inRandomOrder()->take(10)->get();
        $tags = Tag::latest()->inRandomOrder()->take(10)->get();
        return view("member.dashboard", compact('books', 'categories', 'genres', 'tags'));
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
        $user = auth()->user();
        $book = Book::where('slug', $slug)->firstOrFail();
        $book->incrementViews();

        UserBook::updateOrCreate(
            ['user_id' => $user->id, 'book_id' => $book->id, 'read' => true]
        );

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



    public function showByCategory($category){
        $category = Category::findOrFail($category);
        $books = $category->books;
        return view('member.searchBy.searchByCategory', compact('books', 'category'));
    }

    public function showByGenre($genre){
        $genre = Genre::findOrFail($genre);
        $books = $genre->books()->simplePaginate(20);
        return view('member.searchBy.searchByGenre', compact('books', 'genre'));
    }


    public function showByTag($tagId)
    {
        $tag = Tag::findOrFail($tagId);
        $books = $tag->books;

        return view('member.searchBy.searchByTag', compact('books', 'tag'));
    }







    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
