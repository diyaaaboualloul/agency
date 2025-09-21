<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;

class AboutSectionController extends Controller
{
    public function index()
    {
        $sections = AboutSection::orderBy('sort_order')->get();
        return view('admin.about.index', compact('sections'));
    }

    public function edit(AboutSection $aboutSection)
    {
        return view('admin.about.edit', compact('aboutSection'));
    }

    public function update(Request $request, AboutSection $aboutSection)
    {
        $data = $request->validate([
            'title'       => 'nullable|string|max:255',
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
