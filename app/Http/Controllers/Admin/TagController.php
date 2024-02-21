<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\BookTag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        // dd($tags);
        return view('admin.tags.index', compact('tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tag' => 'required|string|min:2'
        ]);

        Tag::create([
            'tag' => $request->input('tag')
        ]);
        $notification = array(
            'message' => 'New Tag Created!!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.tag.view')->with($notification);
    }

    public function destroy($tagId)
    {
        // Find the tag
        $tag = Tag::find($tagId);

        // If tag exists
        if ($tag) {
            // Get all BookTag entries with the tag id
            $bookTags = BookTag::where('tag_id', $tagId)->get();

            // Loop through each BookTag entry and delete it
            foreach ($bookTags as $bookTag) {
                $bookTag->delete();
            }

            // Delete the tag
            $tag->delete();

            $notification = array(
                'message' => 'Tag deleted successfully!!',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Tag not found!!',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    }
}
