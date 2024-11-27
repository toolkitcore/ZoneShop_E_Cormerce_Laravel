<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AuthorizationController extends Controller
{
    public function Show_All_Roles()
    {
        $list_roles = Role::orderBy('id', 'DESC')->with('permissions')->get();
        return view('admin.Authorization.role.all_role', compact('list_roles'));
    }
    public function Show_Permissions()
    {
        $permissions = Permission::orderBy('name', 'ASC')->get();
        return view('admin.Authorization.permission.all_permission', compact('permissions'));
    }
    public function Detail_Roles($id)
    {
        $role = Role::with('permissions')->find($id);
        return view('admin.Authorization.role.role_detail', compact('role'));
    }
    public function Add_Roles()
    {
        $list_permissions = Permission::OrderBy('name', 'DESC')->get();
        return view('admin.Authorization.role.add_role', compact('list_permissions'));
    }
    public function Add_Roles_Action(Request $request)
    {
        $validated = $request->validate([
            'namerole' => 'required|string|max:255',
            'permissions' => 'required|array|min:1',
        ]);

        // Tạo vai trò mới
        $role = new Role();
        $role->name = $request->input('namerole');
        $role->save();

        // Gán permissions cho role
        $role->syncPermissions($request->input('permissions'));

        Session::flash('success', 'Role added successfully!');
        return redirect('admin/all-roles');
    }
    public function Update_Roles($id)
    {
        $role = Role::with('permissions')->find($id);
        $list_permissions = Permission::OrderBy('name', 'DESC')->get();
        $role_name = Role::find($id)->name;
        return view('admin.Authorization.role.edit_role', compact('role', 'list_permissions', 'role_name'));
    }
    public function Update_Roles_Action(Request $request, $id)
    {
        $validated = $request->validate([
            'permissions' => 'required|array|min:1',
        ]);

        $role = Role::find($id);

        $role->syncPermissions($request->input('permissions'));

        Session::flash('success', 'Role Updated successfully!');
        return redirect('admin/all-roles');
    }

    public function Delete_Roles($id)
    {
        $role = Role::find($id);

        if ($role) {
            $role->permissions()->detach();

            $role->delete();

            Session::flash('success', 'Role and its permissions deleted successfully!');
        } else {
            Session::flash('error', 'Role not found!');
        }
        return redirect('admin/all-roles');
    }
}
