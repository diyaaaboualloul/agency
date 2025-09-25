<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /* ------------------ Public ------------------ */
    public function index()
    {
        $services = Service::whereNull('deleted_at')->get(); // exclude trashed
        return view('services', compact('services'));
    }

    // Public: show single service
    public function show($id)
    {
        $service = Service::findOrFail($id);

        $previous = Service::where('id', '<', $service->id)
            ->orderBy('id', 'desc')
            ->first();

        $next = Service::where('id', '>', $service->id)
            ->orderBy('id', 'asc')
            ->first();

        return view('single-service', compact('service', 'previous', 'next'));
    }

    /* ------------------ Admin ------------------ */

    // List services
    public function adminIndex()
    {
        $services = Service::latest()->paginate(15);
        $trashCount = Service::onlyTrashed()->count();

        return view('admin.services.index', compact('services', 'trashCount'));
    }

    // Create form
    public function create()
    {
        return view('admin.services.create');
    }

    // Store new service
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:4096',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $this->convertToWebp($request->file('image'));
        }

        Service::create($data);

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully!');
    }

    // Edit form
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    // Update service
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:4096',
        ]);

        if ($request->hasFile('image')) {
            // حذف الصورة القديمة
            if ($service->image && Storage::disk('public')->exists($service->image)) {
                Storage::disk('public')->delete($service->image);
            }

            $data['image'] = $this->convertToWebp($request->file('image'));
        }

        $service->update($data);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully!');
    }

    // Soft delete
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service moved to Trash.');
    }

    // Trash list
    public function trash()
    {
        $services = Service::onlyTrashed()->latest('deleted_at')->paginate(15);
        return view('admin.services.trash', compact('services'));
    }

    // Restore from Trash
    public function restore($id)
    {
        $service = Service::withTrashed()->findOrFail($id);
        $service->restore();

        return redirect()->route('admin.services.trash')->with('success', 'Service restored successfully!');
    }

    // Permanently delete
    public function forceDelete($id)
    {
        $service = Service::withTrashed()->findOrFail($id);

        if ($service->image && Storage::disk('public')->exists($service->image)) {
            Storage::disk('public')->delete($service->image);
        }

        $service->forceDelete();

        return redirect()->route('admin.services.trash')->with('success', 'Service permanently deleted.');
    }

    /* ------------------ Helper ------------------ */
    private function convertToWebp($image)
    {
        $fileName = 'services/' . time() . '.webp';
        $path = storage_path('app/public/' . $fileName);

        $info = getimagesize($image);

        switch ($info['mime']) {
            case 'image/jpeg':
                $img = imagecreatefromjpeg($image);
                break;
            case 'image/png':
                $img = imagecreatefrompng($image);
                imagepalettetotruecolor($img);
                imagealphablending($img, true);
                imagesavealpha($img, true);
                break;
            case 'image/gif':
                $img = imagecreatefromgif($image);
                break;
            case 'image/webp':
                // لو أصلاً WebP → انسخ كما هو
                $image->storeAs('services', $fileName, 'public');
                return $fileName;
            default:
                return null;
        }

        imagewebp($img, $path, 90);
        imagedestroy($img);

        return $fileName;
    }
}
