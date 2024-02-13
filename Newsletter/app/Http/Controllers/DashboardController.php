<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DashboardController extends Controller
{
    public function getUsersRolesPermissions()
    {
        $users = User::all();
        $roles = Role::all();
        $permissions = Permission::all();
        return view('manage_roles_permissions',compact('users', 'roles', 'permissions'));
    }

    // Méthode pour assigner un rôle à un utilisateur
    public function assignRole(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'role' => 'required|exists:roles,name'
        ]);

        $user = User::findOrFail($validatedData['user_id']);
        $role = Role::where('name', $validatedData['role'])->firstOrFail();

        $user->assignRole($role);

        return redirect()->back()->with('success', 'Rôle assigné avec succès');
    }

    // Méthode pour gérer les permissions pour chaque utilisateur
    public function managePermissions(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,name'
        ]);

        $user->syncPermissions($validatedData['permissions']);

        return redirect()->back()->with('success', 'Permissions mises à jour avec succès');
    }
}
