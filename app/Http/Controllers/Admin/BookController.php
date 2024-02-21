<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $books = Book::latest()->get();

        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $genres = Genre::all();
        $tags = Tag::all();
        return view('admin.books.create', compact('categories', 'genres', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'publisher' => 'required|string',
            'language' => 'required|string',
            'isbn' => 'required|string',
            'total_pages' => 'required|string',
            'category_id' => 'required',
            'genre_id' => 'required',
            'publication_date' => 'required|date',
            'file_format' => 'required|string',
            'file_url' => 'required|url',
            'thumbnail' => 'image|max:10240',
            'tag_id' => 'required|array', // Ensure it's an array and not empty
            'tag_id.*' => 'exists:tags,id',
            'description'  => 'nullable|string'
        ]);
        $book = new Book();


        // Upload thumbnail to 'thumbnail_pdf' folder in the public directory if submitted
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '_' . $thumbnail->getClientOriginalName();
            $thumbnail->move(public_path('thumbnail_pdf'), $thumbnailName);
            $book->thumbnail = 'thumbnail_pdf/' . $thumbnailName;
        }

        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->publication_date = $request->input('publication_date');
        $book->slug = Str::slug($request->input('title'));
        $book->publisher = $request->input('publisher');
        $book->language = $request->input('language');
        $book->isbn = $request->input('isbn');
        $book->file_url = $request->input('file_url');
        $book->total_pages = $request->input('total_pages');
        $book->category_id = $request->input('category_id');
        $book->genre_id = $request->input('genre_id');
        $book->file_format = $request->input('file_format');
        $book->description = $request->input('description');
        $book->status = $request->input('status');


        $book->save();

        // Attach tags to the book
        $book->tags()->attach($request->input('tag_id'));
        $notification = array(
            'message' => 'New Book Added!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.book.view')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $bookTags = $book->tags()->get();
        return view('admin.books.show', compact('book','bookTags'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        // Retrieve the tags associated with the book
        $bookTags = $book->tags()->get();

        // Retrieve categories and genres
        $categories = Category::all();
        $genres = Genre::all();
        $tags = Tag::all();

        // Pass the retrieved data to the view
        return view('admin.books.edit', compact('book', 'categories', 'genres', 'tags', 'bookTags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {

        $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'publisher' => 'required|string',
            'language' => 'required|string',
            'isbn' => 'required|string',
            'total_pages' => 'required|string',
            'category_id' => 'required',
            'genre_id' => 'required',
            'publication_date' => 'required|date',
            'file_format' => 'required|string',
            'file_url' => 'required|url',
            'thumbnail' => 'nullable|image|max:10240',
            'tag_id' => 'required|array', // Ensure it's an array and not empty
            'tag_id.*' => 'exists:tags,id',
            'description'  => 'nullable|string'
        ]);

        $book = Book::where('slug', $slug)->first();
        // dd($book);

        if ($request->hasFile('thumbnail')) {
            $old_thumbnail = $book->thumbnail;
        
            if (!empty($old_thumbnail) && file_exists(public_path($old_thumbnail))) {
                unlink(public_path($old_thumbnail));
            }
        
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '_' . $thumbnail->getClientOriginalName();
            $thumbnail->move(public_path('thumbnail_pdf'), $thumbnailName);
            $book->thumbnail = 'thumbnail_pdf/' . $thumbnailName;
        }
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->publication_date = $request->input('publication_date');
        $book->slug = Str::slug($request->input('title'));
        $book->publisher = $request->input('publisher');
        $book->language = $request->input('language');
        $book->isbn = $request->input('isbn');
        $book->file_url = $request->input('file_url');
        $book->total_pages = $request->input('total_pages');
        $book->category_id = $request->input('category_id');
        $book->genre_id = $request->input('genre_id');
        $book->file_format = $request->input('file_format');
        $book->description = $request->input('description');
        $book->status = $request->input('status');


        $book->save();

        // Attach tags to the book
        $book->tags()->attach($request->input('tag_id'));

        $notification = array(
            'message' => 'Book Details Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.book.view')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
