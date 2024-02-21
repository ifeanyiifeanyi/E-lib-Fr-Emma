<?php

namespace App\Http\Controllers\Admin;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenreController extends Controller
{
    public function index(){
        $genres = Genre::all();
        return view('admin.genre.index', compact('genres'));
    }

    public function store(Request $request) {
        $request->validate([
            'genre' => 'required|string|min:2',
            'description' => 'nullable|string'
        ]);
        Genre::create([
            'genre' => $request->input('genre'),
            'description' => $request->input('description')
        ]);
        $notification = array(
            'message' => 'New Genre Created!!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.genre.view')->with($notification);
    }

    public function destroy($genre){
        Genre::find($genre)->delete();
        $notification = array(
            'message' => 'New Genre Deleted!!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.genre.view')->with($notification);
    }
}
