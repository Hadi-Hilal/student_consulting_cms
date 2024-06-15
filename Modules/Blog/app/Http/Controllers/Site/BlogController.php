<?php

namespace Modules\Blog\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Modules\Blog\Models\BlogCategory;
use Modules\Blog\Models\BlogPost;
use Modules\Podcast\Models\Podcast;

class BlogController extends Controller
{

    public function index()
    {
        $categories = BlogCategory::with('posts')->get();
        $blogs = BlogPost::published()->filter()->latest()->paginate();

        return view('blog::site.index', compact('blogs', 'categories'));

    }

    public function show($slug)
    {
        $blog = BlogPost::published()->whereSlug($slug)->firstOrFail();

        if (!session()->has('blog') || session('blog') !== $blog->id) {
            $blog->visits++;
            $blog->save();
            session()->put('blog', $blog->id);
        }

        $mayLike = BlogPost::published()->cardData()->where('category_id', $blog->category_id)
            ->where('id', '!=', $blog->id)
            ->take(3)->get();

        return view('blog::site.show', compact('blog', 'mayLike'));

    }
}
