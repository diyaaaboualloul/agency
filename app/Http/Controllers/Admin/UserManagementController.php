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
   // Assign role to a user
public function assignRole(Request $request, $id)
{
    $user = User::findOrFail($id);
    $user->syncRoles([$request->role]); // replace old roles with new one

    return redirect()
        ->route('dashboard')
        ->with('success', 'Role updated successfully! You have been redirected to the dashboard.');
}

}
