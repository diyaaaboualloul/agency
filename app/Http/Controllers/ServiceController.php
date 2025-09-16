<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    // 🔹 Public: show all services
    public function index()
    {
        $services = Service::all();
        return view('services', compact('services'));
    }

    // 🔹 Public: show single service with prev/next navigation
    public function show($id)
    {
        $service = Service::findOrFail($id);

        // Previous service (smaller ID)
        $previous = Service::where('id', '<', $service->id)
            ->orderBy('id', 'desc')
            ->first();

        // Next service (larger ID)
        $next = Service::where('id', '>', $service->id)
            ->orderBy('id', 'asc')
            ->first();

    $service = Service::with('projects')->findOrFail($id);

    $previous = Service::where('id', '<', $service->id)->orderBy('id', 'desc')->first();
    $next     = Service::where('id', '>', $service->id)->orderBy('id', 'asc')->first();

    return view('single-service', compact('service', 'previous', 'next'));
}

 

    // 🔹 Admin/Editor: list services
    public function adminIndex()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    // 🔹 Admin/Editor: show create form
    public function create()
    {
        return view('admin.services.create');
    }

    // 🔹 Admin/Editor: store new service
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Save image if uploaded
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        Service::create($data);

        return redirect()->route('admin.services.index')
                         ->with('success', 'Service created successfully!');
    }

    // 🔹 Admin/Editor: show edit form
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    // 🔹 Admin/Editor: update service
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Replace image if new one uploaded
        if ($request->hasFile('image')) {
            if ($service->image && Storage::disk('public')->exists($service->image)) {
                Storage::disk('public')->delete($service->image);
            }
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        $service->update($data);

        return redirect()->route('admin.services.index')
                         ->with('success', 'Service updated successfully!');
    }

    // 🔹 Admin/Editor: delete service
    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        // Delete image if exists
        if ($service->image && Storage::disk('public')->exists($service->image)) {
            Storage::disk('public')->delete($service->image);
        }

        $service->delete();

        return redirect()->route('admin.services.index')
                         ->with('success', 'Service deleted successfully!');
    }
}
