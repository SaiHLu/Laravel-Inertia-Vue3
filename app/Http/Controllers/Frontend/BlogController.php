<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\Blog\BlogResource;
use App\Models\Blog;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $blogs = Blog::with('media')->filter($request->only('search'))
            ->latest('created_at')
            ->paginate(8)
            ->withQueryString();

        return Inertia::render('Frontend/Blog/Index', [
            'blogs' => BlogResource::collection($blogs)
        ]);
    }
}
