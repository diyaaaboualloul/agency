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

        // Previous project
        $previous = Project::where('id', '<', $project->id)
            ->where('is_published', true)
            ->orderBy('id', 'desc')
            ->first();

        // Next project
        $next = Project::where('id', '>', $project->id)
            ->where('is_published', true)
            ->orderBy('id', 'asc')
            ->first();

        return view('singleportfolio', compact('project', 'previous', 'next'));
    }

    /* ---------------- Admin ---------------- */

    // List all (not deleted)
    public function adminIndex()
    {
        $projects = Project::with('service')->latest()->paginate(15);
        $trashCount = Project::onlyTrashed()->count();

        return view('admin.projects.index', compact('projects', 'trashCount'));
    }

    // Create form
    public function create()
    {
        $services = Service::all();
        return view('admin.projects.create', compact('services'));
    }

    // Store
    public function store(Request $request)
    {
        $data = $request->validate([
            'service_id'   => 'required|exists:services,id',
            'title'        => 'required|string|max:255',
            'summary'      => 'nullable|string|max:500',
            'description'  => 'nullable|string',
            'client'       => 'nullable|string|max:255',
            'location'     => 'nullable|string|max:255',
            'completed_at' => 'nullable|date',
            'is_published' => 'boolean',
            'cover_image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('projects', 'public');
        }

        Project::create($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully!');
    }

    // Edit form
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $services = Service::all();
        return view('admin.projects.edit', compact('project', 'services'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $data = $request->validate([
            'service_id'   => 'required|exists:services,id',
            'title'        => 'required|string|max:255',
            'summary'      => 'nullable|string|max:500',
            'description'  => 'nullable|string',
            'client'       => 'nullable|string|max:255',
            'location'     => 'nullable|string|max:255',
            'completed_at' => 'nullable|date',
            'is_published' => 'boolean',
            'cover_image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('cover_image')) {
            if ($project->cover_image && Storage::disk('public')->exists($project->cover_image)) {
                Storage::disk('public')->delete($project->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('projects', 'public');
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully!');
    }

    // Soft delete (move to Trash)
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete(); // sets deleted_at

        return redirect()->route('admin.projects.index')->with('success', 'Project moved to Trash.');
    }

    // Show Trash
    public function trash()
    {
        $projects = Project::onlyTrashed()->with('service')->latest('deleted_at')->paginate(15);
        return view('admin.projects.trash', compact('projects'));
    }

    // Restore from Trash
    public function restore($id)
    {
        $project = Project::withTrashed()->findOrFail($id);
        $project->restore();

        return redirect()->route('admin.projects.trash')->with('success', 'Project restored successfully!');
    }

    // Permanently delete
    public function forceDelete($id)
    {
        $project = Project::withTrashed()->findOrFail($id);

        if ($project->cover_image && Storage::disk('public')->exists($project->cover_image)) {
            Storage::disk('public')->delete($project->cover_image);
        }

        $project->forceDelete();

        return redirect()->route('admin.projects.trash')->with('success', 'Project permanently deleted.');
    }
}
