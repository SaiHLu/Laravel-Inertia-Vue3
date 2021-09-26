<?php

namespace App\Http\Controllers\Backend\AdminUser;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUser\AdminUserCreateRequest;
use App\Models\AdminUser;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        checkPermission('get adminuser');

        $adminUsers = AdminUser::with('roles')
            ->filter($request->only('search'))
            ->paginate(10)
            ->withQueryString()
            ->through(fn ($adminUser) => [
                'id' => $adminUser->id,
                'name' => $adminUser->name,
                'email' => $adminUser->email,
                'role' => $adminUser->roles[0]->name,
                'created_at' => $adminUser->created_at ? $adminUser->created_at->diffForHumans() : null
            ]);

        return Inertia::render('Backend/AdminUser/Index', [
            'adminUsers' => $adminUsers,
            'filters' => $request->only('search')
        ]);
    }

    public function create()
    {
        checkPermission('create adminuser');

        $roles = Role::get(['id', 'name']);

        return Inertia::render('Backend/AdminUser/Create', [
            'roles' => $roles
        ]);
    }

    public function store(AdminUserCreateRequest $request)
    {
        checkPermission('create adminuser');

        $adminUser = AdminUser::create(array_merge($request->all(), [
            'password' => Hash::make($request->password)
        ]));

        $adminUser->syncRoles($request->role);

        return redirect()->back()->with('success', 'Created New AdminUser');
    }

    public function edit($adminUserId)
    {
        checkPermission('edit adminuser');

        $adminUser = AdminUser::with('roles')->where('id', $adminUserId)->firstOrFail();
        $adminRole = $adminUser->roles[0]->id;
        $roles = Role::all();

        return Inertia::render('Backend/AdminUser/Edit', [
            'adminUser' => $adminUser,
            'adminRole' => $adminRole,
            'roles' => $roles
        ]);
    }

    public function update()
    {
        checkPermission('edit adminuser');
    }

    public function destroy()
    {
        checkPermission('delete adminuser');
    }
}
