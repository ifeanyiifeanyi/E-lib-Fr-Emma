<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::latest()->get();
        return view('admin.category.index', compact('categories'));
    }

    public function store(Request $request){
        $request->validate([
            'category' => 'required|string',
            'description' => 'nullable|string'
        ]);

        Category::create([
            'category' => $request->input('category'),
            'description' => $request->input('description')
        ]);
        $notification = array(
    		'message' => 'New category created!',
    		'alert-type' => 'success'
    	);

        return redirect()->route('admin.category.index')->with($notification);
    }

    public function edit($category){
        $categories = Category::latest()->get();

        $category = Category::findOrFail($category);
        return view('admin.category.index', compact('categories', 'category'));
    }

    public function update(Request $request, $category){
        $request->validate([
            'category' => 'required|string',
            'description' => 'nullable|string'
        ]);

        Category::findOrFail($category)->update([
            'category' => $request->input('category'),
            'description' => $request->input('description')
        ]);
        $notification = array(
    		'message' => 'Category updated!',
    		'alert-type' => 'success'
    	);

        return redirect()->route('admin.category.index')->with($notification);
    }

    public function destroy($category){
        Category::findOrFail($category)->delete();
        $notification = array(
    		'message' => 'Category Deleted!',
    		'alert-type' => 'success'
    	);

        return redirect()->route('admin.category.index')->with($notification);
    }
}
