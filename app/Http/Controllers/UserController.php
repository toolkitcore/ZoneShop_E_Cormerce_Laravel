<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function index()
    {
        // $role = Role::create(['name' => 'publisher', 'guard_name' => 'admin']);
        // $permission = Permission::create(['name' => 'add category', 'guard_name' => 'admin']);
        // $permission = Permission::create(['name' => 'edit category', 'guard_name' => 'admin']);
        // $permission = Permission::create(['name' => 'delete category', 'guard_name' => 'admin']);
        // $permission = Permission::create(['name' => 'publish category', 'guard_name' => 'admin']);

        // $permission = Permission::create(['name' => 'add brand', 'guard_name' => 'admin']);
        // $permission = Permission::create(['name' => 'edit brand', 'guard_name' => 'admin']);
        // $permission = Permission::create(['name' => 'delete brand', 'guard_name' => 'admin']);
        // $permission = Permission::create(['name' => 'publish brand', 'guard_name' => 'admin']);

        // $permission = Permission::create(['name' => 'add product attribute', 'guard_name' => 'admin']);
        // $permission = Permission::create(['name' => 'edit product attribute', 'guard_name' => 'admin']);
        // $permission = Permission::create(['name' => 'delete product attribute', 'guard_name' => 'admin']);
        // $permission = Permission::create(['name' => 'publish product attribute', 'guard_name' => 'admin']);

        // $permission = Permission::create(['name' => 'add product detail', 'guard_name' => 'admin']);
        // $permission = Permission::create(['name' => 'edit product detail', 'guard_name' => 'admin']);
        // $permission = Permission::create(['name' => 'delete product detail', 'guard_name' => 'admin']);
        // $permission = Permission::create(['name' => 'publish product detail', 'guard_name' => 'admin']);

        // $permission = Permission::create(['name' => 'add product', 'guard_name' => 'admin']);
        // $permission = Permission::create(['name' => 'edit product', 'guard_name' => 'admin']);
        // $permission = Permission::create(['name' => 'delete product', 'guard_name' => 'admin']);
        // $permission = Permission::create(['name' => 'publish product', 'guard_name' => 'admin']);

        // $permission = Permission::create(['name' => 'add product image', 'guard_name' => 'admin']);
        // $permission = Permission::create(['name' => 'delete product image', 'guard_name' => 'admin']);
        // $permission = Permission::create(['name' => 'publish product image', 'guard_name' => 'admin']);

        // $permission = Permission::create(['name' => 'publish order confirm', 'guard_name' => 'admin']);
        // $permission = Permission::create(['name' => 'publish order list', 'guard_name' => 'admin']);
        // $permission = Permission::create(['name' => 'publish order detail', 'guard_name' => 'admin']);
        // $permission = Permission::create(['name' => 'publish order address', 'guard_name' => 'admin']);
        // $permission = Permission::create(['name' => 'delete order address', 'guard_name' => 'admin']);

        // $permission = Permission::create(['name' => 'add blog', 'guard_name' => 'admin']);
        // $permission = Permission::create(['name' => 'edit blog', 'guard_name' => 'admin']);
        // $permission = Permission::create(['name' => 'delete blog', 'guard_name' => 'admin']);
        // $permission = Permission::create(['name' => 'public blog', 'guard_name' => 'admin']);

        // $permission = Permission::create(['name' => 'public review', 'guard_name' => 'admin']);
        // $permission = Permission::create(['name' => 'delete review', 'guard_name' => 'admin']);

        // $permission = Permission::create(['name' => 'add slider', 'guard_name' => 'admin']);
        // $permission = Permission::create(['name' => 'delete slider', 'guard_name' => 'admin']);
        // $permission = Permission::create(['name' => 'public slider', 'guard_name' => 'admin']);

        // $permission = Permission::create(['name' => 'add poster', 'guard_name' => 'admin']);
        // $permission = Permission::create(['name' => 'delete poster', 'guard_name' => 'admin']);
        // $permission = Permission::create(['name' => 'public poster', 'guard_name' => 'admin']);

        // $permission = Permission::create(['name' => 'add feedback', 'guard_name' => 'admin']);
        // $permission = Permission::create(['name' => 'delete feedback', 'guard_name' => 'admin']);
        // $permission = Permission::create(['name' => 'public feedback', 'guard_name' => 'admin']);
        // $permission = Permission::create(['name' => 'add order address', 'guard_name' => 'admin']);
        // $permission = Permission::create(['name' => 'edit order list', 'guard_name' => 'admin']);

        // $role = Role::find(4);
        // $permission = Permission::whereBetween('id', [17, 62])->get();
        // // $permission = Permission::find(61);

        // $role->syncPermissions($permission);


        // $permission->syncRoles($role);   
        // $role->revokePermissionTo($permission);
        // $permission->removeRole($role);

        // auth()->guard('admin')->user()->syncRoles(['admin']);
        // $admin = Admin::find(3);
        // $admin->assignRole('employee');

        // if ($admin->hasDirectPermission('add category')) {
        //     echo 'có';
        // } else {
        //     echo 'ĐÉO';
        // };
        // $admin->getAllPermissions(); // Or $user->permissions;
        // dd($admin);
        // auth()->guard('admin')->user()->givePermissionTo('edit articles');
        // $admin->givePermissionTo('edit category');
        // $admin->syncPermissions(['delete category', 'edit category', 'add category', 'publish category']);
        // get a list of all permissions dir    ec  tly assigned to the user
        // $permissionNames = $user->getPermissionNames(); // collection of name strings
        // $permissions = $user->permissions; // collection of permission objects

        // // get all permissions for the user, either directly, or from roles, or from both
        // $permissions = $user->getDirectPermissions();
        // $permissions = $user->getPermissionsViaRoles();
        // $permissions = $user->getAllPermissions();

        // // get the names of the user's roles
        // $roles = $user->getRoleNames(); // Returns a collection

        return view('admin.index');
    }
}
