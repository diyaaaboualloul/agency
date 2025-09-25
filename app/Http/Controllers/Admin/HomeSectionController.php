<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeSectionController extends Controller
{
    // 🔹 Public homepage
    public function frontend()
    {
        $hero  = HomepageSection::where('section_key', 'hero')->first();
        $about = HomepageSection::where('section_key', 'about')->first();

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

        // ✅ Convert "image" to WebP
        if ($request->hasFile('image')) {
            $data['image'] = $this->convertToWebp($request->file('image'), 'sections');
        }

        // ✅ Convert "bg_image" to WebP
        if ($request->hasFile('bg_image')) {
            $data['bg_image'] = $this->convertToWebp($request->file('bg_image'), 'sections');
        }

        $homeSection->update($data);

        return redirect()->route('admin.home.index')->with('success', 'Section updated!');
    }

    /**
     * Convert uploaded image to WebP and store it
     */
    private function convertToWebp($image, $folder)
    {
        $path = $image->getRealPath();
        $extension = strtolower($image->getClientOriginalExtension());

        // ✅ Create image resource based on type
        if ($extension === 'png') {
            $img = imagecreatefrompng($path);
        } elseif (in_array($extension, ['jpg', 'jpeg'])) {
            $img = imagecreatefromjpeg($path);
        } elseif ($extension === 'gif') {
            $img = imagecreatefromgif($path);
        } else {
            // إذا كانت WebP أو غير مدعومة → خزّنها عادي
            return $image->store($folder, 'public');
        }

        // ✅ اسم فريد
        $filename = $folder . '/' . uniqid() . '.webp';
        $fullPath = storage_path('app/public/' . $filename);

        // ✅ حفظ WebP بجودة 80
        imagewebp($img, $fullPath, 80);
        imagedestroy($img);

        return $filename;
    }
}
