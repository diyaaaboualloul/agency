<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageSection; // ✅ use the new model
use Illuminate\Http\Request;

class HomeSectionController extends Controller
{
    // 🔹 Public homepage
    public function frontend()
    {
        $hero     = HomepageSection::where('section_key', 'hero')->first();
        $about    = HomepageSection::where('section_key', 'about')->first();

        // Services & Projects will come from their own tables dynamically
        return view('home', compact('hero', 'about'));
    }

    // 🔹 Admin: list all homepage sections
    public function index()
    {
        $sections = HomepageSection::all();
        return view('admin.home.index', compact('sections'));
    }

    // 🔹 Admin: edit one section
    public function edit(HomepageSection $homeSection)
    {
        return view('admin.home.edit', compact('homeSection'));
    }

    // 🔹 Admin: update section
public function update(Request $request, HomepageSection $homeSection)
{
    $data = $request->validate([
        'heading'     => 'nullable|string|max:255',
        'subtitle'    => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'image'       => 'nullable|image|max:2048',
        'bg_image'    => 'nullable|image|max:2048',
        'video_url'   => 'nullable|string|max:255',
        'button_text' => 'nullable|string|max:255',
        'button_url'  => 'nullable|string|max:255',
        'is_active'   => 'boolean',
    ]);

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('sections', 'public');
    }

    if ($request->hasFile('bg_image')) {
        $data['bg_image'] = $request->file('bg_image')->store('sections', 'public');
    }

    $homeSection->update($data);

    return redirect()->route('admin.home.index')->with('success', 'Section updated!');
}

}
