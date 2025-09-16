<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // 🔹 Public: all blogs
    public function index()
    {
        $blogs = Blog::latest()->paginate(6); // paginate 6 blogs
        return view('blog', compact('blogs'));
    }

    // 🔹 Public: single blog
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('single-blog', compact('blog'));
    }

    // 🔹 Admin CRUD (optional for now)
  
    // 🔹 Admin: list all blogs
public function adminIndex()
{
    $blogs = Blog::latest()->paginate(15);
    return view('admin.blogs.index', compact('blogs'));
}

// 🔹 Admin: create form
public function create()
{
    return view('admin.blogs.create');
}

// 🔹 Admin: store
public function store(Request $request)
{
    $data = $request->validate([
        'title'       => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    Blog::create($data);

    return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully!');
}

// 🔹 Admin: edit form
public function edit($id)
{
    $blog = Blog::findOrFail($id);
    return view('admin.blogs.edit', compact('blog'));
}

// 🔹 Admin: update
public function update(Request $request, $id)
{
    $blog = Blog::findOrFail($id);

    $data = $request->validate([
        'title'       => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    $blog->update($data);

    return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully!');
}

// 🔹 Admin: delete
public function destroy($id)
{
    $blog = Blog::findOrFail($id);
    $blog->delete();

    return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully!');
}

}
