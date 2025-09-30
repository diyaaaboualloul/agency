<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /* ---------------- Public ---------------- */

    // All projects
    public function index()
    {
        $projects = Project::where('is_published', true)
            ->with('service')
            ->latest()
            ->paginate(9);

        return view('portfolio', compact('projects'));
    }

    // Single project
    public function show($slug)
    {
        $project = Project::where('slug', $slug)
            ->where('is_published', true)
            ->with('service')
            ->firstOrFail();

        $previous = Project::where('id', '<', $project->id)
            ->where('is_published', true)
            ->orderBy('id', 'desc')
            ->first();

        $next = Project::where('id', '>', $project->id)
            ->where('is_published', true)
            ->orderBy('id', 'asc')
            ->first();

        return view('singleportfolio', compact('project', 'previous', 'next'));
    }

    /* ---------------- Admin ---------------- */

    public function adminIndex()
    {
        $projects = Project::with('service')->latest()->paginate(15);
        $trashCount = Project::onlyTrashed()->count();

        return view('admin.projects.index', compact('projects', 'trashCount'));
    }

    public function create()
    {
        $services = Service::all();
        return view('admin.projects.create', compact('services'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'service_id'   => 'required|exists:services,id',
            'title'        => 'required|string|max:255',
            'summary'      => 'nullable|string|max:500',
            'description'  => 'nullable|string',
            'link'         => 'nullable|url|max:500',   // ✅ new rule
            'client'       => 'nullable|string|max:255',
            'location'     => 'nullable|string|max:255',
            'completed_at' => 'nullable|date',
            'is_published' => 'boolean',
            'cover_image'  => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:4096',
        ]);

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $this->convertToWebp($request->file('cover_image'), 'projects');
        }

        Project::create($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully!');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $services = Service::all();
        return view('admin.projects.edit', compact('project', 'services'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $data = $request->validate([
            'service_id'   => 'required|exists:services,id',
            'title'        => 'required|string|max:255',
            'summary'      => 'nullable|string|max:500',
            'description'  => 'nullable|string',
                'link'         => 'nullable|url|max:500',  // ✅ Add this
            'client'       => 'nullable|string|max:255',
            'location'     => 'nullable|string|max:255',
            'completed_at' => 'nullable|date',
            'is_published' => 'boolean',
            'cover_image'  => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:4096',
        ]);

        if ($request->hasFile('cover_image')) {
            if ($project->cover_image && Storage::disk('public')->exists($project->cover_image)) {
                Storage::disk('public')->delete($project->cover_image);
            }
            $data['cover_image'] = $this->convertToWebp($request->file('cover_image'), 'projects');
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully!');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project moved to Trash.');
    }

    public function trash()
    {
        $projects = Project::onlyTrashed()->with('service')->latest('deleted_at')->paginate(15);
        return view('admin.projects.trash', compact('projects'));
    }

    public function restore($id)
    {
        $project = Project::withTrashed()->findOrFail($id);
        $project->restore();

        return redirect()->route('admin.projects.trash')->with('success', 'Project restored successfully!');
    }

    public function forceDelete($id)
    {
        $project = Project::withTrashed()->findOrFail($id);

        if ($project->cover_image && Storage::disk('public')->exists($project->cover_image)) {
            Storage::disk('public')->delete($project->cover_image);
        }

        $project->forceDelete();

        return redirect()->route('admin.projects.trash')->with('success', 'Project permanently deleted.');
    }

    /**
     * Convert uploaded image to WebP and store it
     */
    private function convertToWebp($image, $folder)
    {
        $path = $image->getRealPath();
        $extension = strtolower($image->getClientOriginalExtension());

        if ($extension === 'png') {
            $img = imagecreatefrompng($path);
        } elseif (in_array($extension, ['jpg', 'jpeg'])) {
            $img = imagecreatefromjpeg($path);
        } elseif ($extension === 'gif') {
            $img = imagecreatefromgif($path);
        } else {
            return $image->store($folder, 'public');
        }

        $filename = $folder . '/' . uniqid() . '.webp';
        $fullPath = storage_path('app/public/' . $filename);

        imagewebp($img, $fullPath, 80);
        imagedestroy($img);

        return $filename;
    }
}
