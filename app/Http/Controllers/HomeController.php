<?php

namespace App\Http\Controllers;

use App\Http\Resources\Blog\BlogResource;
use App\Models\Blog;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $blogs = Blog::with('media')->filter($request->only('search'))
            ->latest('created_at')
            ->limit(6)
            ->get();

        return Inertia::render('Frontend/Home', [
            'blogs' => BlogResource::collection($blogs),
            'filters' => $request->only('search')
        ]);
    }
}
