<?php

namespace App\Http\Controllers\Backend\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\BlogCreateRequest;
use App\Http\Requests\Blog\BlogEditRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        checkPermission('get blog');

        $blogs = Blog::with('media')->filter($request->only('search'))
            ->paginate(10)
            ->withQueryString()
            ->through(fn ($blog) => [
                'id' => $blog->id,
                'title' => $blog->title,
                'image' => $blog->getFirstMediaUrl('blogs'),
                'created_at' => $blog->created_at ? $blog->created_at->diffForHumans() : null
            ]);

        return Inertia::render('Backend/Blog/Index', [
            'blogs' => $blogs,
            'filters' => $request->only('search')
        ]);
    }

    public function create()
    {
        checkPermission('create blog');

        return Inertia::render('Backend/Blog/Create');
    }

    public function store(BlogCreateRequest $request)
    {
        checkPermission('create blog');

        $blog = Blog::create([
            'title' => $request->title
        ]);

        $blog->addMediaFromRequest('image')
            ->sanitizingFileName(function ($fileName) {
                return now()->format('Y-m-d h:i:s') . '-' . $fileName;
            })
            ->toMediaCollection('blogs');

        return redirect()->back()->with('success', 'Created Blog.');
    }

    public function edit($blogId)
    {
        checkPermission('edit blog');

        $blog = Blog::with('media')->where('id', $blogId)->firstOrFail();

        return Inertia::render('Backend/Blog/Edit', [
            'blog' => $blog,
            'blogImage' => $blog->getFirstMediaUrl('blogs')
        ]);
    }

    public function update(BlogEditRequest $request, $blogId)
    {
        checkPermission('edit blog');

        $blog = Blog::where('id', $blogId)->firstOrFail();

        $blog->update([
            'title' => $request->title,
        ]);

        if ($this->imageValidation($request)) {
            $blog->clearMediaCollection('blogs');
            $blog->addMediaFromRequest('image')
                ->sanitizingFileName(function ($fileName) {
                    return now()->format('Y-m-d h:i:s') . '-' . $fileName;
                })->toMediaCollection('blogs');
        }

        return redirect()->back()->with('success', 'Updated Blog.');
    }

    public function destroy($blogId)
    {
        checkPermission('delete blog');

        $blog = Blog::where('id', $blogId)->first();

        $blog->clearMediaCollection('images');
        $blog->delete();

        return redirect()->back()->with('success', 'Deleted Blog.');
    }

    private function imageValidation($request)
    {
        return $request->file('image') && $request->validate([
            'image' => 'mimes:png,jpg,jpeg'
        ]);
    }
}
