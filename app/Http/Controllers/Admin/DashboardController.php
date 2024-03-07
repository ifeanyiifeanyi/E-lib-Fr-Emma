<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\User;
use App\Models\Genre;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ActivatedCode;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class DashboardController extends Controller
{
    public function dashboard(){
        $category = Category::count();
        $genre = Genre::count();
        $activeCodes = ActivatedCode::count();
        $users = User::where('role', 'member')->count();
        $admin = User::where('role', 'admin')->count();
        $books = Book::count();
        return view("admin.dashboard", compact('category', 'genre', 'activeCodes', 'users', 'admin', 'books'));
    }


    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
