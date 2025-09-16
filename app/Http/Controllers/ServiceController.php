<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    // Admin: list services
    public function adminIndex()
    {
        $services = Service::latest()->paginate(15);
        $trashCount = Service::onlyTrashed()->count();

        return view('admin.services.index', compact('services', 'trashCount'));
    }

    // Trash list
    public function trash()
    {
        $services = Service::onlyTrashed()->latest('deleted_at')->paginate(15);
        return view('admin.services.trash', compact('services'));
    }

    // Restore from trash
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

        // delete image if exists
        if ($service->image && Storage::disk('public')->exists($service->image)) {
            Storage::disk('public')->delete($service->image);
        }

        $service->forceDelete();

        return redirect()->route('admin.services.trash')->with('success', 'Service permanently deleted.');
    }

    // Soft delete (override old destroy)
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete(); // sets deleted_at

        return redirect()->route('admin.services.index')->with('success', 'Service moved to Trash.');
    }
}
