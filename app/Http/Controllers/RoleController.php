<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function assignRole(Request $request) {

        $userId = $request->input('user_id', 1);
        $role = $request->input('role', 'admin');
        // Create roles and permissions
        $adminRole = Role::findOrCreate($role);
        Permission::create(['name' => 'view order']);

        // Assign permission to role
        $adminRole->givePermissionTo('view order');

        // Assign role to user
        $user = User::find($userId);
        $user->assignRole('admin');

        return "Role assiged";
    }
}
