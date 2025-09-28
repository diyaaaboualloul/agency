<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    // Show all users with roles
    public function index()
    {
        $users = User::with('roles')->get();
        $roles = Role::all();
        return view('admin.users.assign', compact('users', 'roles'));
    }

    // Assign role to a user
    public function assignRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->syncRoles([$request->role]);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Role updated successfully!');
    }

    // Delete a user
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if (auth()->id() == $user->id) {
            return redirect()->back()->with('error', 'You cannot delete your own account.');
        }

        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully!');
    }
    // App/Http/Controllers/Admin/UserManagementController.php


public function create()
{
    $roles = Role::all(); // fetch all roles from DB
    return view('admin.users.create', compact('roles'));
}


public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'role' => 'required|string'
    ]);

    $user = \App\Models\User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
    ]);

    $user->assignRole($data['role']); // assign admin/editor/viewer

    return redirect()->route('admin.users.index')->with('success', 'User created successfully!');
}

}
