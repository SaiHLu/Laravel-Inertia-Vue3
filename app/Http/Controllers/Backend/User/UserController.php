<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserEditRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index(Request $request)
    {
        checkPermission('get user');

        $users = User::filter($request->only('search'))
            ->paginate(10)
            ->withQueryString()
            ->through(fn ($user) => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'created_at' => $user->created_at->diffForHumans()
            ]);

        return Inertia::render('Backend/Users/Index', [
            'users' => $users,
            'filters' => $request->only('search')
        ]);
    }

    public function create()
    {
        checkPermission('create user');

        return Inertia::render('Backend/Users/Create');
    }

    public function store(UserCreateRequest $request)
    {
        checkPermission('create user');

        User::create(array_merge($request->all(), [
            'password' => Hash::make($request->password)
        ]));

        return redirect()->back()->with('success', 'Created New User');
    }

    public function edit(User $user)
    {
        checkPermission('edit user');

        return Inertia::render('Backend/Users/Edit', [
            'user' => $user
        ]);
    }

    public function update(UserEditRequest $request, User $user)
    {
        checkPermission('edit user');

        if ($request->has('password')) {
            $user->update(array_merge($request->all(), [
                'password' => Hash::make($request->password)
            ]));
        } else {
            $user->update(array_merge($request->all(), [
                'password' => $user->password
            ]));
        }

        return redirect()->back()->with('success', 'Updated User');
    }

    public function destroy(User $user)
    {
        checkPermission('delete user');

        $user->delete();

        return redirect()->back()->with('success', 'Deleted User');
    }
}
