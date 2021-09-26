<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('checkPermission')) {
    function checkPermission($permission)
    {
        if (!auth()->user()->can($permission)) {
            abort(403);
        }
    }
}

if (!function_exists('authUser')) {
    function authUser($guard = 'web')
    {
        return Auth::guard($guard)->user();
    }
}

if (!function_exists('adminAuth')) {
    function adminAuth($guard = 'admin')
    {
        return Auth::guard($guard)->user();
    }
}
