<?php

namespace App\Http\Controllers\Member;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
    
        $books = Book::where('title', 'LIKE', "%$query%")
            ->orWhere('author', 'LIKE', "%$query%")
            ->orWhere('description', 'LIKE', "%$query%")
            ->get();
    // dd($books);

    return view('member.search.searchView', compact('books', 'query'));
        
    }
}
