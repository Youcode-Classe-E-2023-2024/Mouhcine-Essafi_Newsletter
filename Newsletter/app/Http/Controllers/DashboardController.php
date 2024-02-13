<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function handleRolesAndPermissions()
    {
        $this->getUsersRolesPermissions();
        $this->getUsersByRole();
    }
    public function getUsersRolesPermissions()
    {
        $users = User::all();
        $roles = Role::all();
        $permissions = Permission::all();

        // Get the role IDs for the roles you want to filter
        $membreRoleId = Role::where('name', 'Membre')->value('id');
        $adminRoleId = Role::where('name', 'Administrateur')->value('id');
        $redirecteurRoleId = Role::where('name', 'Rédacteur')->value('id');

        // Get users with specific roles
        $usersWithMembreRole = User::role($membreRoleId)->get();
        $usersWithAdminRole = User::role($adminRoleId)->get();
        $usersWithRedirecteurRole = User::role($redirecteurRoleId)->get();

        return view('manage_roles_permissions', compact('users', 'roles', 'permissions', 'usersWithMembreRole', 'usersWithAdminRole', 'usersWithRedirecteurRole'));
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

        // Remove all existing roles for the user
        DB::table('model_has_roles')->where('model_id', $user->id)->delete();

        $user->assignRole($role);

        return redirect()->back()->with('success', 'Rôle assigné avec succès');
    }

    public function getUsersByRole()
    {
        // Get the role IDs for the roles you want to filter
        $membreRoleId = Role::where('name', 'Membre')->value('id');
        $adminRoleId = Role::where('name', 'Administrateur')->value('id');
        $redirecteurRoleId = Role::where('name', 'Rédacteur')->value('id');

        // Get users with specific roles
        $usersWithMembreRole = User::role($membreRoleId)->get();
        $usersWithAdminRole = User::role($adminRoleId)->get();
        $usersWithRedirecteurRole = User::role($redirecteurRoleId)->get();

        return view('manage_roles_permissions', compact('usersWithMembreRole', 'usersWithAdminRole', 'usersWithRedirecteurRole'));
    }
}
