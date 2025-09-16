<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /* ------------------ Public ------------------ */

    // List public blogs
    public function index()
    {
        $blogs = Blog::latest()->paginate(6);
        return view('blog', compact('blogs'));
    }

    // Single public blog
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('single-blog', compact('blog'));
    }

    /* ------------------ Admin ------------------ */

    // List (non-deleted)
    public function adminIndex()
    {
        $blogs = Blog::latest()->paginate(15);
        $trashCount = Blog::onlyTrashed()->count();

        return view('admin.blogs.index', compact('blogs', 'trashCount'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Blog::create($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully!');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit', compact('blog'));
    }

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

    // SOFT DELETE: moves to trash
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete(); // sets deleted_at

        return redirect()->route('admin.blogs.index')->with('success', 'Blog moved to Trash.');
    }

    // Trash list (only deleted)
    public function trash()
    {
        $blogs = Blog::onlyTrashed()->latest('deleted_at')->paginate(15);
        return view('admin.blogs.trash', compact('blogs'));
    }

    // Restore from trash
    public function restore($id)
    {
        $blog = Blog::withTrashed()->findOrFail($id);
        $blog->restore();

        return redirect()->route('admin.blogs.trash')->with('success', 'Blog restored successfully!');
    }

    // Permanently delete
    public function forceDelete($id)
    {
        $blog = Blog::withTrashed()->findOrFail($id);
        $blog->forceDelete();

        return redirect()->route('admin.blogs.trash')->with('success', 'Blog permanently deleted.');
    }
}
