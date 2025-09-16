<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
   // 🔹 Public: all projects
public function index()
{
    $projects = Project::where('is_published', true)
        ->with('service')
        ->latest()
        ->paginate(9);

    return view('portfolio', compact('projects')); // ✅ matches portfolio.blade.php
}

// 🔹 Public: single project
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


    // 🔹 Admin: list projects
    public function adminIndex()
    {
        $projects = Project::with('service')->latest()->paginate(15);
        return view('admin.projects.index', compact('projects'));
    }

    // 🔹 Admin: create form
    public function create()
    {
        $services = Service::all();
        return view('admin.projects.create', compact('services'));
    }

    // 🔹 Admin: store
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

    // 🔹 Admin: edit form
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $services = Service::all();
        return view('admin.projects.edit', compact('project', 'services'));
    }

    // 🔹 Admin: update
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

    // 🔹 Admin: delete
    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        if ($project->cover_image && Storage::disk('public')->exists($project->cover_image)) {
            Storage::disk('public')->delete($project->cover_image);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully!');
    }
}
