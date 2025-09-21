<?php
// app/Http/Controllers/Admin/AboutSectionController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutpageSection;
use Illuminate\Http\Request;

class AboutSectionController extends Controller
{
    // Public frontend
    public function frontend()
    {
        $sections = AboutpageSection::all()->keyBy('section_key');
        return view('about', compact('sections'));
    }

    // Admin index
    public function index()
    {
        $sections = AboutpageSection::all();
        return view('admin.about.index', compact('sections'));
    }

    // Admin edit
    public function edit(AboutpageSection $aboutSection)
    {
        return view('admin.about.edit', compact('aboutSection'));
    }

    // Admin update
    public function update(Request $request, AboutpageSection $aboutSection)
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

        $aboutSection->update($data);

        return redirect()->route('admin.about.index')->with('success', 'Section updated!');
    }
}

