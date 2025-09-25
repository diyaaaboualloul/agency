<?php
// app/Http/Controllers/Admin/AboutSectionController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutpageSection;
use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\Storage;

class AboutSectionController extends Controller
{
    // Public frontend
    public function frontend()
    {
        $sections = AboutpageSection::all()->keyBy('section_key');
        $teamMembers = Team::all();

        return view('about', compact('sections', 'teamMembers'));
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

        // ✅ Handle main image
        if ($request->hasFile('image')) {
            $data['image'] = $this->convertToWebp($request->file('image'), 'sections');
        }

        // ✅ Handle background image
        if ($request->hasFile('bg_image')) {
            $data['bg_image'] = $this->convertToWebp($request->file('bg_image'), 'sections');
        }

        $aboutSection->update($data);

        return redirect()->route('admin.about.index')->with('success', 'Section updated!');
    }

    /**
     * Convert uploaded image to WebP and store it
     */
    private function convertToWebp($image, $folder)
    {
        $path = $image->getRealPath();
        $extension = strtolower($image->getClientOriginalExtension());

        // Create image resource
        if ($extension === 'png') {
            $img = imagecreatefrompng($path);
        } elseif (in_array($extension, ['jpg', 'jpeg'])) {
            $img = imagecreatefromjpeg($path);
        } elseif ($extension === 'gif') {
            $img = imagecreatefromgif($path);
        } else {
            // if already webp or unsupported, just store normally
            return $image->store($folder, 'public');
        }

        // Generate unique file name
        $filename = $folder . '/' . uniqid() . '.webp';
        $fullPath = storage_path('app/public/' . $filename);

        // Save as webp
        imagewebp($img, $fullPath, 80);
        imagedestroy($img);

        return $filename;
    }
}
