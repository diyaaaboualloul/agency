<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // 🔹 Public: show all services
    public function index()
    {
        $services = Service::all();
        return view('services', compact('services'));
    }

    // 🔹 Public: show single service
    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('single-service', compact('service'));
    }

    // 🔹 Admin/Editor: create new service
    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Service::create($data);

        return redirect()->route('admin.services.index')
                         ->with('success', 'Service created successfully!');
    }

    // 🔹 Admin/Editor: list services
    public function adminIndex()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    // 🔹 Admin/Editor: edit service
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $service->update($data);

        return redirect()->route('admin.services.index')
                         ->with('success', 'Service updated successfully!');
    }

    // 🔹 Admin/Editor: delete service
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('admin.services.index')
                         ->with('success', 'Service deleted successfully!');
    }
}
