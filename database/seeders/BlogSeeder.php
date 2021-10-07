<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blog::factory(20)->create()->each(function ($blog) {
            $blog->addMedia(public_path('img/frontend/blog-1.jpg'))
                ->preservingOriginal()
                ->sanitizingFileName(function ($fileName) {
                    return now()->format('Y-m-d h:i:s') . '-' . $fileName;
                })->toMediaCollection('blogs');
        });
    }
}
