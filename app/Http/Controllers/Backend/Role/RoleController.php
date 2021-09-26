<?php

namespace App\Http\Controllers\Backend\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\RoleCreateRequest;
use App\Http\Requests\Role\RoleEditRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Models\Role;
use Inertia\Inertia;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        checkPermission('get role');

        $roles = Role::filter($request->only('search'))
            ->paginate(10)
            ->withQueryString()
            ->through(fn ($role) => [
                'id' => $role->id,
                'name' => $role->name,
                'created_at' => $role->created_at ? $role->created_at->diffForHumans() : null
            ]);

        return Inertia::render('Backend/Role/Index', [
            'roles' => $roles,
            'filters' => $request->only('search')
        ]);
    }

    public function create()
    {
        checkPermission('create role');

        $permissions = Permission::orderBy('name', 'ASC')->get();

        return Inertia::render('Backend/Role/Create', [
            'permissions' => $permissions
        ]);
    }

    public function store(RoleCreateRequest $request)
    {
        checkPermission('create role');

        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'admin',
        ]);

        $permissions = Permission::whereIn('id', $request->permissions)->get();

        $role->syncPermissions($permissions);

        return redirect()->back()->with('success', 'Created New Role');
    }

    public function edit(Role $role)
    {
        checkPermission('edit role');

        $permissions = Permission::orderBy('name', 'ASC')->get();

        $role_permissions = $role->permissions()->allRelatedIds()->toArray();

        return Inertia::render('Backend/Role/Edit', [
            'role'  => $role,
            'permissions' => $permissions,
            'role_permissions' => $role_permissions
        ]);
    }

    public function update(Role $role, RoleEditRequest $request)
    {
        checkPermission('edit role');

        $role->update([
            'name' => $request->name,
        ]);

        $permissions = Permission::whereIn('id', $request->permissions)->get();
        $role->syncPermissions($permissions);

        return redirect()->back()->with('success', 'Updated role.');
    }

    public function destroy(Role $role)
    {
        checkPermission('delete role');

        $role->delete();

        return redirect()->back()->with('success', 'Deleted role.');
    }
}
