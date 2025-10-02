<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $blog = Blog::with('images')->findOrFail($id);
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
            'title'             => 'required|string|max:255',
            'short_description' => 'nullable|string|max:255',
            'description'       => 'required|string',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp||max:2048',
            'gallery.*'         => 'nullable|image|mimes:jpg,jpeg,png,webp||max:2048',
        ]);

        // 🔹 Handle main image upload
        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('blogs', 'public');
        }

        $blog = Blog::create($data);

        // 🔹 Handle gallery uploads
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $index => $file) {
                $path = $file->store('blogs/gallery', 'public');
                BlogImage::create([
                    'blog_id'    => $blog->id,
                    'path'       => $path,
                    'sort_order' => $index,
                ]);
            }
        }

        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully!');
    }

    public function edit($id)
    {
        $blog = Blog::with('images')->findOrFail($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::with('images')->findOrFail($id);

        $data = $request->validate([
            'title'             => 'required|string|max:255',
            'short_description' => 'nullable|string|max:255',
            'description'       => 'required|string',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp||max:2048',
            'gallery.*'         => 'nullable|image|mimes:jpg,jpeg,png,webp||max:2048',
        ]);

        // 🔹 Replace main image if uploaded
        if ($request->hasFile('image')) {
            if ($blog->image_path && Storage::disk('public')->exists($blog->image_path)) {
                Storage::disk('public')->delete($blog->image_path);
            }
            $data['image_path'] = $request->file('image')->store('blogs', 'public');
        }

        $blog->update($data);

        // 🔹 Add new gallery images (if any)
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $index => $file) {
                $path = $file->store('blogs/gallery', 'public');
                BlogImage::create([
                    'blog_id'    => $blog->id,
                    'path'       => $path,
                    'sort_order' => $blog->images()->count() + $index,
                ]);
            }
        }

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully!');
    }

    // SOFT DELETE: moves to trash
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

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

        // 🔹 Delete main image file
        if ($blog->image_path && Storage::disk('public')->exists($blog->image_path)) {
            Storage::disk('public')->delete($blog->image_path);
        }

        // 🔹 Delete gallery images
        foreach ($blog->images as $img) {
            if (Storage::disk('public')->exists($img->path)) {
                Storage::disk('public')->delete($img->path);
            }
            $img->delete();
        }

        $blog->forceDelete();

        return redirect()->route('admin.blogs.trash')->with('success', 'Blog permanently deleted.');
    }
public function deleteGallery($id)
{
    $image = BlogImage::findOrFail($id);

    if (Storage::disk('public')->exists($image->path)) {
        Storage::disk('public')->delete($image->path);
    }

    $image->delete();

    return back()->with('success', 'Gallery image deleted successfully!');
}




}
